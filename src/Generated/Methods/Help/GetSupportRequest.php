<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\Support;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getSupport
 */
final class GetSupportRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9cdf08cd;
    
    public string $predicate = 'help.getSupport';
    
    public function getMethodName(): string
    {
        return 'help.getSupport';
    }
    
    public function getResponseClass(): string
    {
        return Support::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}