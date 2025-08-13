<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsGiveawayOption;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsGiveawayOptions
 */
final class GetStarsGiveawayOptionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbd1efd3e;
    
    public string $predicate = 'payments.getStarsGiveawayOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsGiveawayOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . StarsGiveawayOption::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}