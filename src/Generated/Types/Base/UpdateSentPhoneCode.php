<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateSentPhoneCode
 */
final class UpdateSentPhoneCode extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x504aa18f;
    
    public string $predicate = 'updateSentPhoneCode';
    
    /**
     * @param AbstractSentCode $sentCode
     */
    public function __construct(
        public readonly AbstractSentCode $sentCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sentCode->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $sentCode = AbstractSentCode::deserialize($stream);

        return new self(
            $sentCode
        );
    }
}