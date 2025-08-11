<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deleteChatUser
 */
final class DeleteChatUserRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa2185cab;
    
    public string $_ = 'messages.deleteChatUser';
    
    public function getMethodName(): string
    {
        return 'messages.deleteChatUser';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $chatId
     * @param AbstractInputUser $userId
     * @param bool|null $revokeHistory
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractInputUser $userId,
        public readonly ?bool $revokeHistory = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revokeHistory) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}