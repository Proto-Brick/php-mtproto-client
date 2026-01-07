<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\NearestDc;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getNearestDc
 */
final class GetNearestDcRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1fb33026;
    
    public string $predicate = 'help.getNearestDc';
    
    public function getMethodName(): string
    {
        return 'help.getNearestDc';
    }
    
    public function getResponseClass(): string
    {
        return NearestDc::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}