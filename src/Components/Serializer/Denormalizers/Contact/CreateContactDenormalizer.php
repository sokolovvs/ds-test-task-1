<?php


namespace App\Components\Serializer\Denormalizers\Contact;


use App\Components\Dto\Input\Contact\CreateContactDto;
use App\Util\StringUtils;
use Munus\Control\T;
use Munus\Control\TryTo;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class CreateContactDenormalizer implements DenormalizerInterface
{
    /**
     * @param Request     $data
     * @param string      $type
     * @param string|null $format
     * @param array       $context
     *
     * @return array|T|CreateContactDto
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        return TryTo::run(
            static function () use ($data) {
                $data = json_decode($data->getContent(), true);
                $phone = trim($data['phone']);
                $email = trim($data['email']);
                $message = StringUtils::trimToNull($data['message']);

                return new CreateContactDto($phone, $email, $message);
            }
        )
            ->onFailure(
                static function () {
                    throw new BadRequestHttpException();
                }
            )->get();
    }

    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return $type === CreateContactDto::class && $data instanceof Request;
    }
}
