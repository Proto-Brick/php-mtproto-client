<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\ArchivedStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getArchivedStickers
 */
final class GetArchivedStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x57f17692;
    
    public string $_ = 'messages.getArchivedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getArchivedStickers';
    }
    
    public function getResponseClass(): string
    {
        return ArchivedStickers::class;
    }
    /**
     * @param int $offsetId
     * @param int $limit
     * @param bool|null $masks
     * @param bool|null $emojis
     */
    public function __construct(
        public readonly int $offsetId,
        public readonly int $limit,
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

        $buffer .= $serializer->int64($this->offsetId);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}