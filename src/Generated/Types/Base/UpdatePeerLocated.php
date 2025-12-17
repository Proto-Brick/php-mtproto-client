<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePeerLocated
 */
final class UpdatePeerLocated extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb4afcfb0;
    
    public string $predicate = 'updatePeerLocated';
    
    /**
     * @param list<AbstractPeerLocated> $peers
     */
    public function __construct(
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPeerLocated::class, 'deserialize']);

        return new self(
            $peers
        );
    }
}