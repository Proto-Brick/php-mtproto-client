<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/todoItem
 */
final class TodoItem extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcba9a52f;
    
    public string $predicate = 'todoItem';
    
    /**
     * @param int $id
     * @param TextWithEntities $title
     */
    public function __construct(
        public readonly int $id,
        public readonly TextWithEntities $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->title->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int32($stream);
        $title = TextWithEntities::deserialize($stream);

        return new self(
            $id,
            $title
        );
    }
}