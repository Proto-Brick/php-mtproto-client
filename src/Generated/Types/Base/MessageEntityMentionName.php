<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageEntityMentionName
 */
final class MessageEntityMentionName extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0xdc7b1140;
    
    public string $_ = 'messageEntityMentionName';
    
    /**
     * @param int $offset
     * @param int $length
     * @param int $userId
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $offset = Deserializer::int32($stream);
        $length = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        return new self(
            $offset,
            $length,
            $userId
        );
    }
}