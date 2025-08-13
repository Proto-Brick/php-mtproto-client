<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/todoCompletion
 */
final class TodoCompletion extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4cc120b7;
    
    public string $predicate = 'todoCompletion';
    
    /**
     * @param int $id
     * @param int $completedBy
     * @param int $date
     */
    public function __construct(
        public readonly int $id,
        public readonly int $completedBy,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->completedBy);
        $buffer .= Serializer::int32($this->date);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int32($stream);
        $completedBy = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $id,
            $completedBy,
            $date
        );
    }
}