<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.updateSavedReactionTag
 */
final class UpdateSavedReactionTagRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x60297dec;
    
    public string $predicate = 'messages.updateSavedReactionTag';
    
    public function getMethodName(): string
    {
        return 'messages.updateSavedReactionTag';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractReaction $reaction
     * @param string|null $title
     */
    public function __construct(
        public readonly AbstractReaction $reaction,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->reaction->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        return $buffer;
    }
}