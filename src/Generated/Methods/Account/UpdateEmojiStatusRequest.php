<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateEmojiStatus
 */
final class UpdateEmojiStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfbd3de6b;
    
    public string $predicate = 'account.updateEmojiStatus';
    
    public function getMethodName(): string
    {
        return 'account.updateEmojiStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->emojiStatus->serialize();
        return $buffer;
    }
}