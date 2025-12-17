<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateWebViewResultSent
 */
final class UpdateWebViewResultSent extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1592b79d;
    
    public string $predicate = 'updateWebViewResultSent';
    
    /**
     * @param int $queryId
     */
    public function __construct(
        public readonly int $queryId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->queryId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $queryId = Deserializer::int64($__payload, $__offset);

        return new self(
            $queryId
        );
    }
}