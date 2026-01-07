<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractPassportConfig;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getPassportConfig
 */
final class GetPassportConfigRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc661ad08;
    
    public string $predicate = 'help.getPassportConfig';
    
    public function getMethodName(): string
    {
        return 'help.getPassportConfig';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPassportConfig::class;
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
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}