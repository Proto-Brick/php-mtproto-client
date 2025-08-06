<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/paymentFormMethod
 */
final class PaymentFormMethod extends TlObject
{
    public const CONSTRUCTOR_ID = 0x88f8f21b;
    
    public string $_ = 'paymentFormMethod';
    
    /**
     * @param string $url
     * @param string $title
     */
    public function __construct(
        public readonly string $url,
        public readonly string $title
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->bytes($this->title);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $url = $deserializer->bytes($stream);
        $title = $deserializer->bytes($stream);
        return new self(
            $url,
            $title
        );
    }
}