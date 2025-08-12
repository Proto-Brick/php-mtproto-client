<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFoundStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.searchStickers
 */
final class SearchStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x29b1c66a;
    
    public string $predicate = 'messages.searchStickers';
    
    public function getMethodName(): string
    {
        return 'messages.searchStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFoundStickers::class;
    }
    /**
     * @param string $q
     * @param string $emoticon
     * @param list<string> $langCode
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @param true|null $emojis
     */
    public function __construct(
        public readonly string $q,
        public readonly string $emoticon,
        public readonly array $langCode,
        public readonly int $offset,
        public readonly int $limit,
        public readonly int $hash,
        public readonly ?true $emojis = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->emojis) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->q);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::vectorOfStrings($this->langCode);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}