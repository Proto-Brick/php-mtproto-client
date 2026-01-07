<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/smsjobs.leave
 */
final class LeaveRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9898ad73;
    
    public string $predicate = 'smsjobs.leave';
    
    public function getMethodName(): string
    {
        return 'smsjobs.leave';
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