<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageEntityUnknown
 */
final class MessageEntityUnknown extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0xbb92ba95;
    
    public string $predicate = 'messageEntityUnknown';
    
    /**
     * @param int $offset
     * @param int $length
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $offset = Deserializer::int32($stream);
        $length = Deserializer::int32($stream);

        return new self(
            $offset,
            $length
        );
    }
}