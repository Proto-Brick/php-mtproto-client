<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractEmojiStatuses;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getChannelDefaultEmojiStatuses
 */
final class GetChannelDefaultEmojiStatusesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7727a7d5;
    
    public string $predicate = 'account.getChannelDefaultEmojiStatuses';
    
    public function getMethodName(): string
    {
        return 'account.getChannelDefaultEmojiStatuses';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiStatuses::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}