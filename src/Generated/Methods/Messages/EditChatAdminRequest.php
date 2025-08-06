<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editChatAdmin
 */
final class EditChatAdminRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa85bd1c2;
    
    public string $_ = 'messages.editChatAdmin';
    
    public function getMethodName(): string
    {
        return 'messages.editChatAdmin';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $chatId
     * @param AbstractInputUser $userId
     * @param bool $isAdmin
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputUser $userId,
        public readonly bool $isAdmin
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= ($this->isAdmin ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}