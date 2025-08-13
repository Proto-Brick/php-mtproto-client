<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Bots;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/bots.botInfo
 */
final class BotInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe8a775b0;
    
    public string $predicate = 'bots.botInfo';
    
    /**
     * @param string $name
     * @param string $about
     * @param string $description
     */
    public function __construct(
        public readonly string $name,
        public readonly string $about,
        public readonly string $description
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::bytes($this->about);
        $buffer .= Serializer::bytes($this->description);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $name = Deserializer::bytes($stream);
        $about = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);

        return new self(
            $name,
            $about,
            $description
        );
    }
}