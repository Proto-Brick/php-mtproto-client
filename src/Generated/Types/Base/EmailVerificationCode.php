<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emailVerificationCode
 */
final class EmailVerificationCode extends AbstractEmailVerification
{
    public const CONSTRUCTOR_ID = 0x922e55a9;
    
    public string $predicate = 'emailVerificationCode';
    
    /**
     * @param string $code
     */
    public function __construct(
        public readonly string $code
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->code);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $code = Deserializer::bytes($stream);

        return new self(
            $code
        );
    }
}