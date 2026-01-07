<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractDeepLinkInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getDeepLinkInfo
 */
final class GetDeepLinkInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3fedc75f;
    
    public string $predicate = 'help.getDeepLinkInfo';
    
    public function getMethodName(): string
    {
        return 'help.getDeepLinkInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDeepLinkInfo::class;
    }
    /**
     * @param string $path
     */
    public function __construct(
        public readonly string $path
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->path);
        return $buffer;
    }
}