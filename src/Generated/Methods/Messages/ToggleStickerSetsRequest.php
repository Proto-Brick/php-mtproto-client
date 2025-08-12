<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.toggleStickerSets
 */
final class ToggleStickerSetsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb5052fea;
    
    public string $predicate = 'messages.toggleStickerSets';
    
    public function getMethodName(): string
    {
        return 'messages.toggleStickerSets';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<AbstractInputStickerSet> $stickersets
     * @param true|null $uninstall
     * @param true|null $archive
     * @param true|null $unarchive
     */
    public function __construct(
        public readonly array $stickersets,
        public readonly ?true $uninstall = null,
        public readonly ?true $archive = null,
        public readonly ?true $unarchive = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->uninstall) $flags |= (1 << 0);
        if ($this->archive) $flags |= (1 << 1);
        if ($this->unarchive) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->stickersets);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}