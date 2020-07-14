<?php


namespace App\Components\Serializer\Normalizers\Contact;


use App\Components\Dto\Output\Contact\ContactDto;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ContactDtoNormalizer implements NormalizerInterface
{
    /**
     * @param ContactDto  $object
     * @param string|null $format
     * @param array       $context
     *
     * @return array
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return [
            'id' => $object->getId(),
            'email' => $object->getEmail(),
            'phone' => $object->getPhone(),
            'message' => $object->getMessage(),
        ];
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof ContactDto;
    }
}
