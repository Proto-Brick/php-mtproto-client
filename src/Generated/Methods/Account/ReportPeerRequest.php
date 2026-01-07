<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportReason;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.reportPeer
 */
final class ReportPeerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc5ba3d86;
    
    public string $predicate = 'account.reportPeer';
    
    public function getMethodName(): string
    {
        return 'account.reportPeer';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param ReportReason $reason
     * @param string $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ReportReason $reason,
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->reason->serialize();
        $buffer .= Serializer::bytes($this->message);
        return $buffer;
    }
}