<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\Generated\Types\Base\WebViewResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.requestSimpleWebView
 */
final class RequestSimpleWebViewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x413a3e73;
    
    public string $_ = 'messages.requestSimpleWebView';
    
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
     * @param bool|null $fromSwitchWebview
     * @param bool|null $fromSideMenu
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $url
     * @param string|null $startParam
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $platform,
        public readonly ?bool $fromSwitchWebview = null,
        public readonly ?bool $fromSideMenu = null,
        public readonly ?bool $compact = null,
        public readonly ?bool $fullscreen = null,
        public readonly ?string $url = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromSwitchWebview) $flags |= (1 << 1);
        if ($this->fromSideMenu) $flags |= (1 << 2);
        if ($this->compact) $flags |= (1 << 7);
        if ($this->fullscreen) $flags |= (1 << 8);
        if ($this->url !== null) $flags |= (1 << 3);
        if ($this->startParam !== null) $flags |= (1 << 4);
        if ($this->themeParams !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->bot->serialize();
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->startParam);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes(json_encode($this->themeParams, JSON_FORCE_OBJECT));
        }
        $buffer .= Serializer::bytes($this->platform);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}