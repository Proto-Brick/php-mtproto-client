<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.saveDefaultGroupCallJoinAs
 */
final class SaveDefaultGroupCallJoinAsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x575e1f8c;
    
    public string $predicate = 'phone.saveDefaultGroupCallJoinAs';
    
    public function getMethodName(): string
    {
        return 'phone.saveDefaultGroupCallJoinAs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputPeer $joinAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputPeer $joinAs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->joinAs->serialize();
        return $buffer;
    }
}