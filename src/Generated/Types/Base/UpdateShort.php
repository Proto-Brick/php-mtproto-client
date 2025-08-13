<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateShort
 */
final class UpdateShort extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 0x78d4dec1;
    
    public string $predicate = 'updateShort';
    
    /**
     * @param AbstractUpdate $update
     * @param int $date
     */
    public function __construct(
        public readonly AbstractUpdate $update,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->update->serialize();
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $update = AbstractUpdate::deserialize($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $update,
            $date
        );
    }
}