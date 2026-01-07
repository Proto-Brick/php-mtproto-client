<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\ExportedGroupCallInvite;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.exportGroupCallInvite
 */
final class ExportGroupCallInviteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe6aa647f;
    
    public string $predicate = 'phone.exportGroupCallInvite';
    
    public function getMethodName(): string
    {
        return 'phone.exportGroupCallInvite';
    }
    
    public function getResponseClass(): string
    {
        return ExportedGroupCallInvite::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param true|null $canSelfUnmute
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?true $canSelfUnmute = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canSelfUnmute) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        return $buffer;
    }
}