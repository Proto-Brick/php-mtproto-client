<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessagesFilter;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.searchCounter
 */
final class SearchCounter extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe844ebff;
    
    public string $predicate = 'messages.searchCounter';
    
    /**
     * @param AbstractMessagesFilter $filter
     * @param int $count
     * @param true|null $inexact
     */
    public function __construct(
        public readonly AbstractMessagesFilter $filter,
        public readonly int $count,
        public readonly ?true $inexact = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $inexact = (($flags & (1 << 1)) !== 0) ? true : null;
        $filter = AbstractMessagesFilter::deserialize($stream);
        $count = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $filter,
            $count,
            $inexact
        );
    }
}