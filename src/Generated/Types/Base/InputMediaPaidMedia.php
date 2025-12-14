<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaPaidMedia
 */
final class InputMediaPaidMedia extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xc4103386;
    
    public string $predicate = 'inputMediaPaidMedia';
    
    /**
     * @param int $starsAmount
     * @param list<AbstractInputMedia> $extendedMedia
     * @param string|null $payload
     */
    public function __construct(
        public readonly int $starsAmount,
        public readonly array $extendedMedia,
        public readonly ?string $payload = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->payload !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->starsAmount);
        $buffer .= Serializer::vectorOfObjects($this->extendedMedia);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->payload);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $starsAmount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $extendedMedia = Deserializer::vectorOfObjects($stream, [AbstractInputMedia::class, 'deserialize']);
        $payload = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $starsAmount,
            $extendedMedia,
            $payload
        );
    }
}