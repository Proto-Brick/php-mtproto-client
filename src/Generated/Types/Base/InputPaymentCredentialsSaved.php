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
    
    public string $predicate = 'inputPaymentCredentialsSaved';
    
    /**
     * @param string $id
     * @param string $tmpPassword
     */
    public function __construct(
        public readonly string $id,
        public readonly string $tmpPassword
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->tmpPassword);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::bytes($stream);
        $tmpPassword = Deserializer::bytes($stream);

        return new self(
            $id,
            $tmpPassword
        );
    }
}