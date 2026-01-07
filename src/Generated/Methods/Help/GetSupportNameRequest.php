<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\SupportName;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getSupportName
 */
final class GetSupportNameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd360e72c;
    
    public string $predicate = 'help.getSupportName';
    
    public function getMethodName(): string
    {
        return 'help.getSupportName';
    }
    
    public function getResponseClass(): string
    {
        return SupportName::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}