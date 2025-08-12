<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotApp;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botApp
 */
final class BotApp extends TlObject
{
    public const CONSTRUCTOR_ID = 0xeb50adf5;
    
    public string $predicate = 'messages.botApp';
    
    /**
     * @param AbstractBotApp $app
     * @param true|null $inactive
     * @param true|null $requestWriteAccess
     * @param true|null $hasSettings
     */
    public function __construct(
        public readonly AbstractBotApp $app,
        public readonly ?true $inactive = null,
        public readonly ?true $requestWriteAccess = null,
        public readonly ?true $hasSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inactive) $flags |= (1 << 0);
        if ($this->requestWriteAccess) $flags |= (1 << 1);
        if ($this->hasSettings) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->app->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $inactive = ($flags & (1 << 0)) ? true : null;
        $requestWriteAccess = ($flags & (1 << 1)) ? true : null;
        $hasSettings = ($flags & (1 << 2)) ? true : null;
        $app = AbstractBotApp::deserialize($stream);

        return new self(
            $app,
            $inactive,
            $requestWriteAccess,
            $hasSettings
        );
    }
}