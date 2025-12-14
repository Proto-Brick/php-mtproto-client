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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $queryId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $queryId
        );
    }
}