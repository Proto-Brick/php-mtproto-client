<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.reorderStickerSets
 */
final class ReorderStickerSetsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x78337739;
    
    public string $predicate = 'messages.reorderStickerSets';
    
    public function getMethodName(): string
    {
        return 'messages.reorderStickerSets';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $order
     * @param true|null $masks
     * @param true|null $emojis
     */
    public function __construct(
        public readonly array $order,
        public readonly ?true $masks = null,
        public readonly ?true $emojis = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) $flags |= (1 << 0);
        if ($this->emojis) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfLongs($this->order);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}