<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.toggleGroupCallRecord
 */
final class ToggleGroupCallRecordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf128c708;
    
    public string $predicate = 'phone.toggleGroupCallRecord';
    
    public function getMethodName(): string
    {
        return 'phone.toggleGroupCallRecord';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param true|null $start
     * @param true|null $video
     * @param string|null $title
     * @param bool|null $videoPortrait
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly ?true $start = null,
        public readonly ?true $video = null,
        public readonly ?string $title = null,
        public readonly ?bool $videoPortrait = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->start) {
            $flags |= (1 << 0);
        }
        if ($this->video) {
            $flags |= (1 << 2);
        }
        if ($this->title !== null) {
            $flags |= (1 << 1);
        }
        if ($this->videoPortrait !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->videoPortrait ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
}