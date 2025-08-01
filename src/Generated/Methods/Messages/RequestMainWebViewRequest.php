<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebViewResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.requestMainWebView
 */
final class RequestMainWebViewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3386908283;
    
    public string $_ = 'messages.requestMainWebView';
    
    public function getMethodName(): string
    {
        return 'messages.requestMainWebView';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWebViewResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $bot
     * @param string $platform
     * @param bool|null $compact
     * @param bool|null $fullscreen
     * @param string|null $startParam
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $bot,
        public readonly string $platform,
        public readonly ?bool $compact = null,
        public readonly ?bool $fullscreen = null,
        public readonly ?string $startParam = null,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->compact) $flags |= (1 << 7);
        if ($this->fullscreen) $flags |= (1 << 8);
        if ($this->startParam !== null) $flags |= (1 << 1);
        if ($this->themeParams !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->bot->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->startParam);
        }
        if ($flags & (1 << 0)) {
            $buffer .= (new DataJSON(json_encode($this->themeParams)))->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->platform);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}