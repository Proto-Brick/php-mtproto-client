<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebViewResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.requestMainWebView
 */
final class RequestMainWebViewRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc9e01e7b;
    
    public string $predicate = 'messages.requestMainWebView';
    
    public function getMethodName(): string
    {
        return 'messages.requestMainWebView';
    }
    
    public function getResponseClass(): string
    {
        return WebViewResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     * @param string $platform
     * @param true|null $compact
     * @param true|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot,
        public readonly string $platform,
        public readonly ?true $compact = null,
        public readonly ?true $fullscreen = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->compact) {
            $flags |= (1 << 7);
        }
        if ($this->fullscreen) {
            $flags |= (1 << 8);
        }
        if ($this->startParam !== null) {
            $flags |= (1 << 1);
        }
        if ($this->themeParams !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->bot->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->startParam);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::serializeDataJSON($this->themeParams);
        }
        $buffer .= Serializer::bytes($this->platform);
        return $buffer;
    }
}