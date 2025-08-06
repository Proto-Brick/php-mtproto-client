<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.prolongWebView
 */
final class ProlongWebViewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb0d81a83;
    
    public string $_ = 'messages.prolongWebView';
    
    public function getMethodName(): string
    {
        return 'messages.prolongWebView';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     * @param int $queryId
     * @param bool|null $silent
     * @param AbstractInputReplyTo|null $replyTo
     * @param AbstractInputPeer|null $sendAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot,
        public readonly int $queryId,
        public readonly ?bool $silent = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) $flags |= (1 << 5);
        if ($this->replyTo !== null) $flags |= (1 << 0);
        if ($this->sendAs !== null) $flags |= (1 << 13);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize($serializer);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}