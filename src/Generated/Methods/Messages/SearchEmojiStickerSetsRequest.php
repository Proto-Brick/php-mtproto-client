<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFoundStickerSets;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.searchEmojiStickerSets
 */
final class SearchEmojiStickerSetsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x92b4494c;
    
    public string $_ = 'messages.searchEmojiStickerSets';
    
    public function getMethodName(): string
    {
        return 'messages.searchEmojiStickerSets';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFoundStickerSets::class;
    }
    /**
     * @param string $q
     * @param int $hash
     * @param bool|null $excludeFeatured
     */
    public function __construct(
        public readonly string $q,
        public readonly int $hash,
        public readonly ?bool $excludeFeatured = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludeFeatured) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->q);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}