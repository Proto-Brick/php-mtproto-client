<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedDialogs;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSavedDialogsByID
 */
final class GetSavedDialogsByIDRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6f6f9c96;
    
    public string $predicate = 'messages.getSavedDialogsByID';
    
    public function getMethodName(): string
    {
        return 'messages.getSavedDialogsByID';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedDialogs::class;
    }
    /**
     * @param list<AbstractInputPeer> $ids
     * @param AbstractInputPeer|null $parentPeer
     */
    public function __construct(
        public readonly array $ids,
        public readonly ?AbstractInputPeer $parentPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->parentPeer !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->parentPeer->serialize();
        }
        $buffer .= Serializer::vectorOfObjects($this->ids);
        return $buffer;
    }
}