<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Updates;

use ProtoBrick\MTProtoClient\Generated\Types\Updates\State;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/updates.getState
 */
final class GetStateRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xedd4882a;
    
    public string $predicate = 'updates.getState';
    
    public function getMethodName(): string
    {
        return 'updates.getState';
    }
    
    public function getResponseClass(): string
    {
        return State::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}