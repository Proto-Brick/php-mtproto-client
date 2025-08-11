<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedMessageLink;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.exportMessageLink
 */
final class ExportMessageLinkRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe63fadeb;
    
    public string $_ = 'channels.exportMessageLink';
    
    public function getMethodName(): string
    {
        return 'channels.exportMessageLink';
    }
    
    public function getResponseClass(): string
    {
        return ExportedMessageLink::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $id
     * @param bool|null $grouped
     * @param bool|null $thread
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $id,
        public readonly ?bool $grouped = null,
        public readonly ?bool $thread = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->grouped) $flags |= (1 << 0);
        if ($this->thread) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}