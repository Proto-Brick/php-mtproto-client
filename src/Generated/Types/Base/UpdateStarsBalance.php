<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStarsBalance
 */
final class UpdateStarsBalance extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x4e80a379;
    
    public string $predicate = 'updateStarsBalance';
    
    /**
     * @param AbstractStarsAmount $balance
     */
    public function __construct(
        public readonly AbstractStarsAmount $balance
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->balance->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $balance = AbstractStarsAmount::deserialize($stream);

        return new self(
            $balance
        );
    }
}