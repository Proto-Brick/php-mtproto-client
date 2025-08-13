<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsTopupOption;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsTopupOptions
 */
final class GetStarsTopupOptionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc00ec7d3;
    
    public string $predicate = 'payments.getStarsTopupOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsTopupOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . StarsTopupOption::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}