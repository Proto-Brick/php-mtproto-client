<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\PremiumPromo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getPremiumPromo
 */
final class GetPremiumPromoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb81b93d4;
    
    public string $predicate = 'help.getPremiumPromo';
    
    public function getMethodName(): string
    {
        return 'help.getPremiumPromo';
    }
    
    public function getResponseClass(): string
    {
        return PremiumPromo::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}