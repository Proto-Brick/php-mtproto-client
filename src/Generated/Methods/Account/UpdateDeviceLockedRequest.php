<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateDeviceLocked
 */
final class UpdateDeviceLockedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x38df3532;
    
    public string $predicate = 'account.updateDeviceLocked';
    
    public function getMethodName(): string
    {
        return 'account.updateDeviceLocked';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $period
     */
    public function __construct(
        public readonly int $period
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->period);
        return $buffer;
    }
}