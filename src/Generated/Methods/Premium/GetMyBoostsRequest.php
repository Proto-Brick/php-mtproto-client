<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Premium;

use ProtoBrick\MTProtoClient\Generated\Types\Premium\MyBoosts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/premium.getMyBoosts
 */
final class GetMyBoostsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbe77b4a;
    
    public string $predicate = 'premium.getMyBoosts';
    
    public function getMethodName(): string
    {
        return 'premium.getMyBoosts';
    }
    
    public function getResponseClass(): string
    {
        return MyBoosts::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}