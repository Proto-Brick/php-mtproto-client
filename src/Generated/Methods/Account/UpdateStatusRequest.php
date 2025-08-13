<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateStatus
 */
final class UpdateStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6628562c;
    
    public string $predicate = 'account.updateStatus';
    
    public function getMethodName(): string
    {
        return 'account.updateStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool $offline
     */
    public function __construct(
        public readonly bool $offline
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->offline ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}