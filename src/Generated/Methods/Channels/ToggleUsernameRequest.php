<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.toggleUsername
 */
final class ToggleUsernameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x50f24105;
    
    public string $_ = 'channels.toggleUsername';
    
    public function getMethodName(): string
    {
        return 'channels.toggleUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param string $username
     * @param bool $active
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly string $username,
        public readonly bool $active
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::bytes($this->username);
        $buffer .= ($this->active ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}