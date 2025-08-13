<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/pollAnswer
 */
final class PollAnswer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff16e2ca;
    
    public string $predicate = 'pollAnswer';
    
    /**
     * @param TextWithEntities $text
     * @param string $option
     */
    public function __construct(
        public readonly TextWithEntities $text,
        public readonly string $option
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->option);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $text = TextWithEntities::deserialize($stream);
        $option = Deserializer::bytes($stream);

        return new self(
            $text,
            $option
        );
    }
}