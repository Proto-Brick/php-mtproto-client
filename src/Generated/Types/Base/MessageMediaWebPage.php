<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaWebPage
 */
final class MessageMediaWebPage extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xddf10c3b;
    
    public string $predicate = 'messageMediaWebPage';
    
    /**
     * @param AbstractWebPage $webpage
     * @param true|null $forceLargeMedia
     * @param true|null $forceSmallMedia
     * @param true|null $manual
     * @param true|null $safe
     */
    public function __construct(
        public readonly AbstractWebPage $webpage,
        public readonly ?true $forceLargeMedia = null,
        public readonly ?true $forceSmallMedia = null,
        public readonly ?true $manual = null,
        public readonly ?true $safe = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forceLargeMedia) {
            $flags |= (1 << 0);
        }
        if ($this->forceSmallMedia) {
            $flags |= (1 << 1);
        }
        if ($this->manual) {
            $flags |= (1 << 3);
        }
        if ($this->safe) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->webpage->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $forceLargeMedia = (($flags & (1 << 0)) !== 0) ? true : null;
        $forceSmallMedia = (($flags & (1 << 1)) !== 0) ? true : null;
        $manual = (($flags & (1 << 3)) !== 0) ? true : null;
        $safe = (($flags & (1 << 4)) !== 0) ? true : null;
        $webpage = AbstractWebPage::deserialize($__payload, $__offset);

        return new self(
            $webpage,
            $forceLargeMedia,
            $forceSmallMedia,
            $manual,
            $safe
        );
    }
}