<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialogFilter;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.dialogFilters
 */
final class DialogFilters extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2ad93719;
    
    public string $predicate = 'messages.dialogFilters';
    
    /**
     * @param list<AbstractDialogFilter> $filters
     * @param true|null $tagsEnabled
     */
    public function __construct(
        public readonly array $filters,
        public readonly ?true $tagsEnabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->tagsEnabled) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->filters);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $tagsEnabled = (($flags & (1 << 0)) !== 0) ? true : null;
        $filters = Deserializer::vectorOfObjects($stream, [AbstractDialogFilter::class, 'deserialize']);

        return new self(
            $filters,
            $tagsEnabled
        );
    }
}