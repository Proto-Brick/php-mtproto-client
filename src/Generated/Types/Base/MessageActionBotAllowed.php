<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionBotAllowed
 */
final class MessageActionBotAllowed extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 3306608249;
    
    public string $_ = 'messageActionBotAllowed';
    
    /**
     * @param bool|null $attachMenu
     * @param bool|null $fromRequest
     * @param string|null $domain
     * @param AbstractBotApp|null $app
     */
    public function __construct(
        public readonly ?bool $attachMenu = null,
        public readonly ?bool $fromRequest = null,
        public readonly ?string $domain = null,
        public readonly ?AbstractBotApp $app = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->attachMenu) $flags |= (1 << 1);
        if ($this->fromRequest) $flags |= (1 << 3);
        if ($this->domain !== null) $flags |= (1 << 0);
        if ($this->app !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->domain);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->app->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $attachMenu = ($flags & (1 << 1)) ? true : null;
        $fromRequest = ($flags & (1 << 3)) ? true : null;
        $domain = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $app = ($flags & (1 << 2)) ? AbstractBotApp::deserialize($deserializer, $stream) : null;
            return new self(
            $attachMenu,
            $fromRequest,
            $domain,
            $app
        );
    }
}