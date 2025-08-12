<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractUserInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.editUserInfo
 */
final class EditUserInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x66b91b70;
    
    public string $predicate = 'help.editUserInfo';
    
    public function getMethodName(): string
    {
        return 'help.editUserInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUserInfo::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $message
     * @param list<AbstractMessageEntity> $entities
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $message,
        public readonly array $entities
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->message);
        $buffer .= Serializer::vectorOfObjects($this->entities);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}