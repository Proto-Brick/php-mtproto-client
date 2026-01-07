<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebViewResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.requestWebView
 */
final class RequestWebViewRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x269dc2c1;
    
    public string $predicate = 'messages.requestWebView';
    
    public function getMethodName(): string
    {
        return 'messages.requestWebView';
    }
    
    public function getResponseClass(): string
    {
        return WebViewResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     * @param string $platform
     * @param true|null $fromBotMenu
     * @param true|null $silent
     * @param true|null $compact
     * @param true|null $fullscreen
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
        public readonly ?true $fromBotMenu = null,
        public readonly ?true $silent = null,
        public readonly ?true $compact = null,
        public readonly ?true $fullscreen = null,
        public readonly ?string $url = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromBotMenu) {
            $flags |= (1 << 4);
        }
        if ($this->silent) {
            $flags |= (1 << 5);
        }
        if ($this->compact) {
            $flags |= (1 << 7);
        }
        if ($this->fullscreen) {
            $flags |= (1 << 8);
        }
        if ($this->url !== null) {
            $flags |= (1 << 1);
        }
        if ($this->startParam !== null) {
            $flags |= (1 << 3);
        }
        if ($this->themeParams !== null) {
            $flags |= (1 << 2);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->sendAs !== null) {
            $flags |= (1 << 13);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->bot->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->startParam);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::serializeDataJSON($this->themeParams);
        }
        $buffer .= Serializer::bytes($this->platform);
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize();
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize();
        }
        return $buffer;
    }
}