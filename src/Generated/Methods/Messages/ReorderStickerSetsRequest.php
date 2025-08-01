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
    public const CONSTRUCTOR_ID = 2016638777;
    
    public string $_ = 'messages.reorderStickerSets';
    
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
     * @param bool|null $masks
     * @param bool|null $emojis
     */
    public function __construct(
        public readonly array $order,
        public readonly ?bool $masks = null,
        public readonly ?bool $emojis = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) $flags |= (1 << 0);
        if ($this->emojis) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfLongs($this->order);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}