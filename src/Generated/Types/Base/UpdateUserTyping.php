<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateUserTyping
 */
final class UpdateUserTyping extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xc01e857f;
    
    public string $_ = 'updateUserTyping';
    
    /**
     * @param int $userId
     * @param AbstractSendMessageAction $action
     */
    public function __construct(
        public readonly int $userId,
        public readonly AbstractSendMessageAction $action
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $this->action->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = $deserializer->int64($stream);
        $action = AbstractSendMessageAction::deserialize($deserializer, $stream);
        return new self(
            $userId,
            $action
        );
    }
}