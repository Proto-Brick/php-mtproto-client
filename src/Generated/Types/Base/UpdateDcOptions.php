<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDcOptions
 */
final class UpdateDcOptions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8e5e9873;
    
    public string $predicate = 'updateDcOptions';
    
    /**
     * @param list<DcOption> $dcOptions
     */
    public function __construct(
        public readonly array $dcOptions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->dcOptions);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $dcOptions = Deserializer::vectorOfObjects($stream, [DcOption::class, 'deserialize']);

        return new self(
            $dcOptions
        );
    }
}