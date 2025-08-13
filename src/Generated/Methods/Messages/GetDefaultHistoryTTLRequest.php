<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\DefaultHistoryTTL;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getDefaultHistoryTTL
 */
final class GetDefaultHistoryTTLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x658b7188;
    
    public string $predicate = 'messages.getDefaultHistoryTTL';
    
    public function getMethodName(): string
    {
        return 'messages.getDefaultHistoryTTL';
    }
    
    public function getResponseClass(): string
    {
        return DefaultHistoryTTL::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}