<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/pollAnswerVoters
 */
final class PollAnswerVoters extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3b6ddad2;
    
    public string $predicate = 'pollAnswerVoters';
    
    /**
     * @param string $option
     * @param int $voters
     * @param true|null $chosen
     * @param true|null $correct
     */
    public function __construct(
        public readonly string $option,
        public readonly int $voters,
        public readonly ?true $chosen = null,
        public readonly ?true $correct = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chosen) {
            $flags |= (1 << 0);
        }
        if ($this->correct) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->option);
        $buffer .= Serializer::int32($this->voters);
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
        $chosen = (($flags & (1 << 0)) !== 0) ? true : null;
        $correct = (($flags & (1 << 1)) !== 0) ? true : null;
        $option = Deserializer::bytes($stream);
        $voters = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $option,
            $voters,
            $chosen,
            $correct
        );
    }
}