<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.clearAllDrafts
 */
final class ClearAllDraftsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7e58ee9c;
    
    public string $predicate = 'messages.clearAllDrafts';
    
    public function getMethodName(): string
    {
        return 'messages.clearAllDrafts';
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