<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotApp;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\Generated\Types\Base\WebViewResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.requestAppWebView
 */
final class RequestAppWebViewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x53618bce;
    
    public string $_ = 'messages.requestAppWebView';
    
    public function getMethodName(): string
    {
        return 'messages.requestAppWebView';
    }
    
    public function getResponseClass(): string
    {
        return WebViewResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputBotApp $app
     * @param string $platform
     * @param bool|null $writeAllowed
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputBotApp $app,
        public readonly string $platform,
        public readonly ?bool $writeAllowed = null,
        public readonly ?bool $compact = null,
        public readonly ?bool $fullscreen = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->writeAllowed) $flags |= (1 << 0);
        if ($this->compact) $flags |= (1 << 7);
        if ($this->fullscreen) $flags |= (1 << 8);
        if ($this->startParam !== null) $flags |= (1 << 1);
        if ($this->themeParams !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->app->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->startParam);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes(json_encode($this->themeParams, JSON_FORCE_OBJECT));
        }
        $buffer .= $serializer->bytes($this->platform);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}