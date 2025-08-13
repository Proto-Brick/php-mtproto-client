<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockAudio
 */
final class PageBlockAudio extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x804361ea;
    
    public string $predicate = 'pageBlockAudio';
    
    /**
     * @param int $audioId
     * @param PageCaption $caption
     */
    public function __construct(
        public readonly int $audioId,
        public readonly PageCaption $caption
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->audioId);
        $buffer .= $this->caption->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $audioId = Deserializer::int64($stream);
        $caption = PageCaption::deserialize($stream);

        return new self(
            $audioId,
            $caption
        );
    }
}