<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/smsjobs.join
 */
final class JoinRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa74ece2d;
    
    public string $predicate = 'smsjobs.join';
    
    public function getMethodName(): string
    {
        return 'smsjobs.join';
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