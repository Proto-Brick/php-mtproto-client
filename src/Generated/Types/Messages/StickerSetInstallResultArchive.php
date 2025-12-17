<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStickerSetCovered;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.stickerSetInstallResultArchive
 */
final class StickerSetInstallResultArchive extends AbstractStickerSetInstallResult
{
    public const CONSTRUCTOR_ID = 0x35e410a8;
    
    public string $predicate = 'messages.stickerSetInstallResultArchive';
    
    /**
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly array $sets
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->sets);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $sets = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStickerSetCovered::class, 'deserialize']);

        return new self(
            $sets
        );
    }
}