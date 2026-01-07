<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\SavedInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getSavedInfo
 */
final class GetSavedInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x227d824b;
    
    public string $predicate = 'payments.getSavedInfo';
    
    public function getMethodName(): string
    {
        return 'payments.getSavedInfo';
    }
    
    public function getResponseClass(): string
    {
        return SavedInfo::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}