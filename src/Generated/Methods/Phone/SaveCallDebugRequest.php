<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoneCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.saveCallDebug
 */
final class SaveCallDebugRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x277add7e;
    
    public string $predicate = 'phone.saveCallDebug';
    
    public function getMethodName(): string
    {
        return 'phone.saveCallDebug';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputPhoneCall $peer
     * @param array $debug
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly array $debug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::serializeDataJSON($this->debug);
        return $buffer;
    }
}