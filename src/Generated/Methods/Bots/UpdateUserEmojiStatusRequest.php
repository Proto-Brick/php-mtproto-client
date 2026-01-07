<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.updateUserEmojiStatus
 */
final class UpdateUserEmojiStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xed9f30c5;
    
    public string $predicate = 'bots.updateUserEmojiStatus';
    
    public function getMethodName(): string
    {
        return 'bots.updateUserEmojiStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= $this->emojiStatus->serialize();
        return $buffer;
    }
}