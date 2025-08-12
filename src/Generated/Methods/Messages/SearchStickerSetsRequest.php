<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFoundStickerSets;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.searchStickerSets
 */
final class SearchStickerSetsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x35705b8a;
    
    public string $predicate = 'messages.searchStickerSets';
    
    public function getMethodName(): string
    {
        return 'messages.searchStickerSets';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFoundStickerSets::class;
    }
    /**
     * @param string $q
     * @param int $hash
     * @param true|null $excludeFeatured
     */
    public function __construct(
        public readonly string $q,
        public readonly int $hash,
        public readonly ?true $excludeFeatured = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludeFeatured) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->q);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}