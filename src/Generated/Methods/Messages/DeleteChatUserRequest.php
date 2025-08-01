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
    public const CONSTRUCTOR_ID = 2719505579;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revokeHistory) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $this->userId->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}