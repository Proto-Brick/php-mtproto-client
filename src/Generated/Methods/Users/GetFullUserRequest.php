<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Users;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Users\UserFull;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/users.getFullUser
 */
final class GetFullUserRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb60f5918;
    
    public string $_ = 'users.getFullUser';
    
    public function getMethodName(): string
    {
        return 'users.getFullUser';
    }
    
    public function getResponseClass(): string
    {
        return UserFull::class;
    }
    /**
     * @param AbstractInputUser $id
     */
    public function __construct(
        public readonly AbstractInputUser $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}