<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractPromoData;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getPromoData
 */
final class GetPromoDataRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc0977421;
    
    public string $predicate = 'help.getPromoData';
    
    public function getMethodName(): string
    {
        return 'help.getPromoData';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPromoData::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}