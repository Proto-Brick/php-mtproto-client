<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateGroupCallChainBlocks
 */
final class UpdateGroupCallChainBlocks extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa477288f;
    
    public string $predicate = 'updateGroupCallChainBlocks';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param int $subChainId
     * @param list<string> $blocks
     * @param int $nextOffset
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $subChainId,
        public readonly array $blocks,
        public readonly int $nextOffset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->subChainId);
        $buffer .= Serializer::vectorOfStrings($this->blocks);
        $buffer .= Serializer::int32($this->nextOffset);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $call = AbstractInputGroupCall::deserialize($stream);
        $subChainId = Deserializer::int32($stream);
        $blocks = Deserializer::vectorOfStrings($stream);
        $nextOffset = Deserializer::int32($stream);

        return new self(
            $call,
            $subChainId,
            $blocks,
            $nextOffset
        );
    }
}