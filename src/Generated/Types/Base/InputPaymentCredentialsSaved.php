<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPaymentCredentialsSaved
 */
final class InputPaymentCredentialsSaved extends AbstractInputPaymentCredentials
{
    public const CONSTRUCTOR_ID = 0xc10eb2cf;
    
    public string $_ = 'inputPaymentCredentialsSaved';
    
    /**
     * @param string $id
     * @param string $tmpPassword
     */
    public function __construct(
        public readonly string $id,
        public readonly string $tmpPassword
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->tmpPassword);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $tmpPassword = $deserializer->bytes($stream);
        return new self(
            $id,
            $tmpPassword
        );
    }
}