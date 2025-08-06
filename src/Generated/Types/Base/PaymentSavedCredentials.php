<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/paymentSavedCredentialsCard
 */
final class PaymentSavedCredentials extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcdc27a1f;
    
    public string $_ = 'paymentSavedCredentialsCard';
    
    /**
     * @param string $id
     * @param string $title
     */
    public function __construct(
        public readonly string $id,
        public readonly string $title
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->title);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $id = $deserializer->bytes($stream);
        $title = $deserializer->bytes($stream);
        return new self(
            $id,
            $title
        );
    }
}