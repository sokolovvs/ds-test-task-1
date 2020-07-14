<?php


namespace App\Components\Serializer\Normalizers\HttpError;


use App\Components\Errors\Http\HttpError;
use ArrayObject;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class HttpErrorNormalizer implements NormalizerInterface
{
    /**
     * @param HttpError   $object
     * @param string|null $format
     * @param array       $context
     *
     * @return array|ArrayObject|bool|float|int|string|void|null
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return [
            'type' => $object->getType(),
            'title' => 'Error',
            'status' => $object->getStatus(),
            'detail' => $object->getDetail(),
            'instance' => null,
            'invalid-params' => $object->getInvalidParams(),
        ];
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof HttpError;
    }
}
