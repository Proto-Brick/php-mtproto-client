<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractSavedRingtones;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getSavedRingtones
 */
final class GetSavedRingtonesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe1902288;
    
    public string $predicate = 'account.getSavedRingtones';
    
    public function getMethodName(): string
    {
        return 'account.getSavedRingtones';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedRingtones::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}