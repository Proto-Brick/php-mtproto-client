<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractSavedMusicIds;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getSavedMusicIds
 */
final class GetSavedMusicIdsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe09d5faf;
    
    public string $predicate = 'account.getSavedMusicIds';
    
    public function getMethodName(): string
    {
        return 'account.getSavedMusicIds';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedMusicIds::class;
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