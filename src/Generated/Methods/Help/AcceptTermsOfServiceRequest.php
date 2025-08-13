<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.acceptTermsOfService
 */
final class AcceptTermsOfServiceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xee72f79a;
    
    public string $predicate = 'help.acceptTermsOfService';
    
    public function getMethodName(): string
    {
        return 'help.acceptTermsOfService';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param array $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->id);
        return $buffer;
    }
}