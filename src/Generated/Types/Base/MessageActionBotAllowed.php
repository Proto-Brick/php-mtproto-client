<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionBotAllowed
 */
final class MessageActionBotAllowed extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xc516d679;
    
    public string $predicate = 'messageActionBotAllowed';
    
    /**
     * @param true|null $attachMenu
     * @param true|null $fromRequest
     * @param string|null $domain
     * @param AbstractBotApp|null $app
     */
    public function __construct(
        public readonly ?true $attachMenu = null,
        public readonly ?true $fromRequest = null,
        public readonly ?string $domain = null,
        public readonly ?AbstractBotApp $app = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->attachMenu) {
            $flags |= (1 << 1);
        }
        if ($this->fromRequest) {
            $flags |= (1 << 3);
        }
        if ($this->domain !== null) {
            $flags |= (1 << 0);
        }
        if ($this->app !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->domain);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->app->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $attachMenu = (($flags & (1 << 1)) !== 0) ? true : null;
        $fromRequest = (($flags & (1 << 3)) !== 0) ? true : null;
        $domain = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $app = (($flags & (1 << 2)) !== 0) ? AbstractBotApp::deserialize($stream) : null;

        return new self(
            $attachMenu,
            $fromRequest,
            $domain,
            $app
        );
    }
}