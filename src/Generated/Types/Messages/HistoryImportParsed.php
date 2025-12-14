<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.historyImportParsed
 */
final class HistoryImportParsed extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5e0fb7b9;
    
    public string $predicate = 'messages.historyImportParsed';
    
    /**
     * @param true|null $pm
     * @param true|null $group
     * @param string|null $title
     */
    public function __construct(
        public readonly ?true $pm = null,
        public readonly ?true $group = null,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pm) {
            $flags |= (1 << 0);
        }
        if ($this->group) {
            $flags |= (1 << 1);
        }
        if ($this->title !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->title);
        }
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
        $pm = (($flags & (1 << 0)) !== 0) ? true : null;
        $group = (($flags & (1 << 1)) !== 0) ? true : null;
        $title = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $pm,
            $group,
            $title
        );
    }
}