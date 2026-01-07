<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.joinGroupCallPresentation
 */
final class JoinGroupCallPresentationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcbea6bc4;
    
    public string $predicate = 'phone.joinGroupCallPresentation';
    
    public function getMethodName(): string
    {
        return 'phone.joinGroupCallPresentation';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param array $params
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $params
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::serializeDataJSON($this->params);
        return $buffer;
    }
}