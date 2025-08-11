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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->action->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $userId = Deserializer::int64($stream);
        $action = AbstractSendMessageAction::deserialize($stream);
        return new self(
            $userId,
            $action
        );
    }
}