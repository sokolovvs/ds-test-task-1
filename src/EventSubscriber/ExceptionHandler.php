<?php


namespace App\EventSubscriber;


use App\Components\Errors\Http\HttpError;
use App\Components\Serializer\Normalizers\HttpError\HttpErrorNormalizer;
use App\Exceptions\ImproveException;
use App\Exceptions\Validation\ValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionHandler implements EventSubscriberInterface
{
    private HttpErrorNormalizer $httpErrorNormalizer;

    public function __construct(HttpErrorNormalizer $httpErrorNormalizer)
    {
        $this->httpErrorNormalizer = $httpErrorNormalizer;
    }

    public function handle(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $code = Response::HTTP_INTERNAL_SERVER_ERROR;

        if ($exception instanceof ImproveException) {
            $errors = $exception->getErrors();
            $message = $exception->getMessage();

            if ($exception instanceof ValidationException) {
                $code = Response::HTTP_UNPROCESSABLE_ENTITY;
            }
        } else {
            $errors = [];
        }

        if ($exception instanceof BadRequestHttpException) {
            $code = Response::HTTP_BAD_REQUEST;
            $message = 'Bad Request';
        }

        $message = $message ?? 'Unknown error';

        $httpError = new HttpError(
            'https://tools.ietf.org/html/rfc2616#section-10', 'Error',
            $code, $message, null, $errors
        );

        if (getenv('APP_ENV') === 'dev' && !$exception instanceof ImproveException) {
            throw  $exception;
        }

        $event->setResponse(
            new JsonResponse(
                $this->httpErrorNormalizer->normalize($httpError), $code, ['Content-Type' => 'application/problem+json']
            )
        );
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'handle',
        ];
    }
}
