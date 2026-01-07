<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportReason;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.reportProfilePhoto
 */
final class ReportProfilePhotoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfa8cc6f5;
    
    public string $predicate = 'account.reportProfilePhoto';
    
    public function getMethodName(): string
    {
        return 'account.reportProfilePhoto';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputPhoto $photoId
     * @param ReportReason $reason
     * @param string $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputPhoto $photoId,
        public readonly ReportReason $reason,
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->photoId->serialize();
        $buffer .= $this->reason->serialize();
        $buffer .= Serializer::bytes($this->message);
        return $buffer;
    }
}