<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallProtocol;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\PhoneCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.requestCall
 */
final class RequestCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x42ff96ed;
    
    public string $predicate = 'phone.requestCall';
    
    public function getMethodName(): string
    {
        return 'phone.requestCall';
    }
    
    public function getResponseClass(): string
    {
        return PhoneCall::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $randomId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param true|null $video
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $randomId,
        public readonly string $gAHash,
        public readonly PhoneCallProtocol $protocol,
        public readonly ?true $video = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->randomId);
        $buffer .= Serializer::bytes($this->gAHash);
        $buffer .= $this->protocol->serialize();
        return $buffer;
    }
}