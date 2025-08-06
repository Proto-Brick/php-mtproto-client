<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.toggleUsername
 */
final class ToggleUsernameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x58d6b376;
    
    public string $_ = 'account.toggleUsername';
    
    public function getMethodName(): string
    {
        return 'account.toggleUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $username
     * @param bool $active
     */
    public function __construct(
        public readonly string $username,
        public readonly bool $active
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->username);
        $buffer .= ($this->active ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}