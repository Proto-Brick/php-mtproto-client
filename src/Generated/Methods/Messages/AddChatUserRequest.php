<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractInvitedUsers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.addChatUser
 */
final class AddChatUserRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3418804487;
    
    public string $_ = 'messages.addChatUser';
    
    public function getMethodName(): string
    {
        return 'messages.addChatUser';
    }
    
    public function getResponseClass(): string
    {
        return AbstractInvitedUsers::class;
    }
    /**
     * @param int $chatId
     * @param AbstractInputUser $userId
     * @param int $fwdLimit
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputUser $userId,
        public readonly int $fwdLimit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int32($this->fwdLimit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}