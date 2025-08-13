<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebViewResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.requestSimpleWebView
 */
final class RequestSimpleWebViewRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x413a3e73;
    
    public string $predicate = 'messages.requestSimpleWebView';
    
    public function getMethodName(): string
    {
        return 'messages.requestSimpleWebView';
    }
    
    public function getResponseClass(): string
    {
        return WebViewResult::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $platform
     * @param true|null $fromSwitchWebview
     * @param true|null $fromSideMenu
     * @param true|null $compact
     * @param true|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $platform,
        public readonly ?true $fromSwitchWebview = null,
        public readonly ?true $fromSideMenu = null,
        public readonly ?true $compact = null,
        public readonly ?true $fullscreen = null,
        public readonly ?string $url = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromSwitchWebview) {
            $flags |= (1 << 1);
        }
        if ($this->fromSideMenu) {
            $flags |= (1 << 2);
        }
        if ($this->compact) {
            $flags |= (1 << 7);
        }
        if ($this->fullscreen) {
            $flags |= (1 << 8);
        }
        if ($this->url !== null) {
            $flags |= (1 << 3);
        }
        if ($this->startParam !== null) {
            $flags |= (1 << 4);
        }
        if ($this->themeParams !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->bot->serialize();
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->startParam);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::serializeDataJSON($this->themeParams);
        }
        $buffer .= Serializer::bytes($this->platform);
        return $buffer;
    }
}