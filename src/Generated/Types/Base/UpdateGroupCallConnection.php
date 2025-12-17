<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCallConnection
 */
final class UpdateGroupCallConnection extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb783982;
    
    public string $predicate = 'updateGroupCallConnection';
    
    /**
     * @param array $params
     * @param true|null $presentation
     */
    public function __construct(
        public readonly array $params,
        public readonly ?true $presentation = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->presentation) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::serializeDataJSON($this->params);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $presentation = (($flags & (1 << 0)) !== 0) ? true : null;
        $params = Deserializer::deserializeDataJSON($__payload, $__offset);

        return new self(
            $params,
            $presentation
        );
    }
}