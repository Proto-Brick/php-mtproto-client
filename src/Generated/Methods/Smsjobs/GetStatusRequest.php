<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs;

use ProtoBrick\MTProtoClient\Generated\Types\Smsjobs\Status;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/smsjobs.getStatus
 */
final class GetStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x10a698e8;
    
    public string $predicate = 'smsjobs.getStatus';
    
    public function getMethodName(): string
    {
        return 'smsjobs.getStatus';
    }
    
    public function getResponseClass(): string
    {
        return Status::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}