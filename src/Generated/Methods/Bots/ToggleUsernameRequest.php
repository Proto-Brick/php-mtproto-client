<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.toggleUsername
 */
final class ToggleUsernameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 87861619;
    
    public string $_ = 'bots.toggleUsername';
    
    public function getMethodName(): string
    {
        return 'bots.toggleUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $username
     * @param bool $active
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $username,
        public readonly bool $active
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->bytes($this->username);
        $buffer .= ($this->active ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}