<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractWallPapers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getWallPapers
 */
final class GetWallPapersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7967d36;
    
    public string $predicate = 'account.getWallPapers';
    
    public function getMethodName(): string
    {
        return 'account.getWallPapers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWallPapers::class;
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