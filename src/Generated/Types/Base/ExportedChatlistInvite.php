<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/exportedChatlistInvite
 */
final class ExportedChatlistInvite extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc5181ac;
    
    public string $predicate = 'exportedChatlistInvite';
    
    /**
     * @param string $title
     * @param string $url
     * @param list<AbstractPeer> $peers
     */
    public function __construct(
        public readonly string $title,
        public readonly string $url,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $url = Deserializer::bytes($__payload, $__offset);
        $peers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPeer::class, 'deserialize']);

        return new self(
            $title,
            $url,
            $peers
        );
    }
}