<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.editGroupCallTitle
 */
final class EditGroupCallTitleRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1ca6ac0a;
    
    public string $predicate = 'phone.editGroupCallTitle';
    
    public function getMethodName(): string
    {
        return 'phone.editGroupCallTitle';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param string $title
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
}