<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDeleteGroupCallMessages
 */
final class UpdateDeleteGroupCallMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x3e85e92c;
    
    public string $predicate = 'updateDeleteGroupCallMessages';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param list<int> $messages
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $messages
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfInts($this->messages);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);
        $messages = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $call,
            $messages
        );
    }
}