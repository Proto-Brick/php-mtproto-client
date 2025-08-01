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
    public const CONSTRUCTOR_ID = 1723407216;
    
    public string $_ = 'help.editUserInfo';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->bytes($this->message);
        $buffer .= $serializer->vectorOfObjects($this->entities);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}