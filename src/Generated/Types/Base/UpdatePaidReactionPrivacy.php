<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePaidReactionPrivacy
 */
final class UpdatePaidReactionPrivacy extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x51ca7aec;
    
    public string $_ = 'updatePaidReactionPrivacy';
    
    /**
     * @param bool $private
     */
    public function __construct(
        public readonly bool $private
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->private ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $private = ($deserializer->int32($stream) === 0x997275b5);
        return new self(
            $private
        );
    }
}