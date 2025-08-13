<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.clearRecentReactions
 */
final class ClearRecentReactionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9dfeefb4;
    
    public string $predicate = 'messages.clearRecentReactions';
    
    public function getMethodName(): string
    {
        return 'messages.clearRecentReactions';
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