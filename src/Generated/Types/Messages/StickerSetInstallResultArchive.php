<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.stickerSetInstallResultArchive
 */
final class StickerSetInstallResultArchive extends AbstractStickerSetInstallResult
{
    public const CONSTRUCTOR_ID = 0x35e410a8;
    
    public string $_ = 'messages.stickerSetInstallResultArchive';
    
    /**
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly array $sets
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->sets);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $sets = $deserializer->vectorOfObjects($stream, [AbstractStickerSetCovered::class, 'deserialize']);
        return new self(
            $sets
        );
    }
}