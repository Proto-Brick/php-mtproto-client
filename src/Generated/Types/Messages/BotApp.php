<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotApp;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->inactive) {
            $flags |= (1 << 0);
        }
        if ($this->requestWriteAccess) {
            $flags |= (1 << 1);
        }
        if ($this->hasSettings) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->app->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $inactive = (($flags & (1 << 0)) !== 0) ? true : null;
        $requestWriteAccess = (($flags & (1 << 1)) !== 0) ? true : null;
        $hasSettings = (($flags & (1 << 2)) !== 0) ? true : null;
        $app = AbstractBotApp::deserialize($stream);

        return new self(
            $app,
            $inactive,
            $requestWriteAccess,
            $hasSettings
        );
    }
}