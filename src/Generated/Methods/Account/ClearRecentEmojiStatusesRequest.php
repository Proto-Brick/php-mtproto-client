<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.clearRecentEmojiStatuses
 */
final class ClearRecentEmojiStatusesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x18201aae;
    
    public string $predicate = 'account.clearRecentEmojiStatuses';
    
    public function getMethodName(): string
    {
        return 'account.clearRecentEmojiStatuses';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}