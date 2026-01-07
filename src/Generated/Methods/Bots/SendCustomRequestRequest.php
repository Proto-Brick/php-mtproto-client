<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.sendCustomRequest
 */
final class SendCustomRequestRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xaa2769ed;
    
    public string $predicate = 'bots.sendCustomRequest';
    
    public function getMethodName(): string
    {
        return 'bots.sendCustomRequest';
    }
    
    public function getResponseClass(): string
    {
        return 'array';
    }
    /**
     * @param string $customMethod
     * @param array $params
     */
    public function __construct(
        public readonly string $customMethod,
        public readonly array $params
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->customMethod);
        $buffer .= Serializer::serializeDataJSON($this->params);
        return $buffer;
    }
}