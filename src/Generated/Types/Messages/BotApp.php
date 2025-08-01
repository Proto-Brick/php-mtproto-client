<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotApp;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botApp
 */
final class BotApp extends AbstractBotApp
{
    public const CONSTRUCTOR_ID = 3947933173;
    
    public string $_ = 'messages.botApp';
    
    /**
     * @param AbstractBotApp $app
     * @param bool|null $inactive
     * @param bool|null $requestWriteAccess
     * @param bool|null $hasSettings
     */
    public function __construct(
        public readonly AbstractBotApp $app,
        public readonly ?bool $inactive = null,
        public readonly ?bool $requestWriteAccess = null,
        public readonly ?bool $hasSettings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inactive) $flags |= (1 << 0);
        if ($this->requestWriteAccess) $flags |= (1 << 1);
        if ($this->hasSettings) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->app->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $inactive = ($flags & (1 << 0)) ? true : null;
        $requestWriteAccess = ($flags & (1 << 1)) ? true : null;
        $hasSettings = ($flags & (1 << 2)) ? true : null;
        $app = AbstractBotApp::deserialize($deserializer, $stream);
            return new self(
            $app,
            $inactive,
            $requestWriteAccess,
            $hasSettings
        );
    }
}