<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resetWallPapers
 */
final class ResetWallPapersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbb3b9804;
    
    public string $predicate = 'account.resetWallPapers';
    
    public function getMethodName(): string
    {
        return 'account.resetWallPapers';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}