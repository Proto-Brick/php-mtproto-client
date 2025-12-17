<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\BotPreviewMedia;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/bots.previewInfo
 */
final class PreviewInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xca71d64;
    
    public string $predicate = 'bots.previewInfo';
    
    /**
     * @param list<BotPreviewMedia> $media
     * @param list<string> $langCodes
     */
    public function __construct(
        public readonly array $media,
        public readonly array $langCodes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->media);
        $buffer .= Serializer::vectorOfStrings($this->langCodes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $media = Deserializer::vectorOfObjects($__payload, $__offset, [BotPreviewMedia::class, 'deserialize']);
        $langCodes = Deserializer::vectorOfStrings($__payload, $__offset);

        return new self(
            $media,
            $langCodes
        );
    }
}