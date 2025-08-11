<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionSetMessagesTTL
 */
final class MessageActionSetMessagesTTL extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x3c134d7b;
    
    public string $_ = 'messageActionSetMessagesTTL';
    
    /**
     * @param int $period
     * @param int|null $autoSettingFrom
     */
    public function __construct(
        public readonly int $period,
        public readonly ?int $autoSettingFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autoSettingFrom !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->period);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->autoSettingFrom);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $period = Deserializer::int32($stream);
        $autoSettingFrom = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        return new self(
            $period,
            $autoSettingFrom
        );
    }
}