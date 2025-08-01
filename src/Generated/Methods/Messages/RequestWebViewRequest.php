<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebViewResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.requestWebView
 */
final class RequestWebViewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 647873217;
    
    public string $_ = 'messages.requestWebView';
    
    public function getMethodName(): string
    {
        return 'messages.requestWebView';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWebViewResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     * @param string $platform
     * @param bool|null $fromBotMenu
     * @param bool|null $silent
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     * @param AbstractInputReplyTo|null $replyTo
     * @param AbstractInputPeer|null $sendAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot,
        public readonly string $platform,
        public readonly ?bool $fromBotMenu = null,
        public readonly ?bool $silent = null,
        public readonly ?bool $compact = null,
        public readonly ?bool $fullscreen = null,
        public readonly ?string $url = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromBotMenu) $flags |= (1 << 4);
        if ($this->silent) $flags |= (1 << 5);
        if ($this->compact) $flags |= (1 << 7);
        if ($this->fullscreen) $flags |= (1 << 8);
        if ($this->url !== null) $flags |= (1 << 1);
        if ($this->startParam !== null) $flags |= (1 << 3);
        if ($this->themeParams !== null) $flags |= (1 << 2);
        if ($this->replyTo !== null) $flags |= (1 << 0);
        if ($this->sendAs !== null) $flags |= (1 << 13);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->bot->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->url);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->startParam);
        }
        if ($flags & (1 << 2)) {
            $buffer .= (new DataJSON(json_encode($this->themeParams)))->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->platform);
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