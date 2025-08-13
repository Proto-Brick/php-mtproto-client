<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractAppUpdate;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getAppUpdate
 */
final class GetAppUpdateRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x522d5a7d;
    
    public string $predicate = 'help.getAppUpdate';
    
    public function getMethodName(): string
    {
        return 'help.getAppUpdate';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAppUpdate::class;
    }
    /**
     * @param string $source
     */
    public function __construct(
        public readonly string $source
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->source);
        return $buffer;
    }
}