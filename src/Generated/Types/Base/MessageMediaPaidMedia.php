<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaPaidMedia
 */
final class MessageMediaPaidMedia extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xa8852491;
    
    public string $predicate = 'messageMediaPaidMedia';
    
    /**
     * @param int $starsAmount
     * @param list<AbstractMessageExtendedMedia> $extendedMedia
     */
    public function __construct(
        public readonly int $starsAmount,
        public readonly array $extendedMedia
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->starsAmount);
        $buffer .= Serializer::vectorOfObjects($this->extendedMedia);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $starsAmount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $extendedMedia = Deserializer::vectorOfObjects($stream, [AbstractMessageExtendedMedia::class, 'deserialize']);

        return new self(
            $starsAmount,
            $extendedMedia
        );
    }
}