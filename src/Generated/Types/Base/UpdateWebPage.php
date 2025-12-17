<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateWebPage
 */
final class UpdateWebPage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7f891213;
    
    public string $predicate = 'updateWebPage';
    
    /**
     * @param AbstractWebPage $webpage
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractWebPage $webpage,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->webpage->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $webpage = AbstractWebPage::deserialize($__payload, $__offset);
        $pts = Deserializer::int32($__payload, $__offset);
        $ptsCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $webpage,
            $pts,
            $ptsCount
        );
    }
}