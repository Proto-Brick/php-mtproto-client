<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/botPreviewMedia
 */
final class BotPreviewMedia extends TlObject
{
    public const CONSTRUCTOR_ID = 0x23e91ba3;
    
    public string $predicate = 'botPreviewMedia';
    
    /**
     * @param int $date
     * @param AbstractMessageMedia $media
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractMessageMedia $media
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->media->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $date = Deserializer::int32($stream);
        $media = AbstractMessageMedia::deserialize($stream);

        return new self(
            $date,
            $media
        );
    }
}