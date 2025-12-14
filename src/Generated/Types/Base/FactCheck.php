<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/factCheck
 */
final class FactCheck extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb89bfccf;
    
    public string $predicate = 'factCheck';
    
    /**
     * @param int $hash
     * @param true|null $needCheck
     * @param string|null $country
     * @param TextWithEntities|null $text
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?true $needCheck = null,
        public readonly ?string $country = null,
        public readonly ?TextWithEntities $text = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->needCheck) {
            $flags |= (1 << 0);
        }
        if ($this->country !== null) {
            $flags |= (1 << 1);
        }
        if ($this->text !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->country);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->text->serialize();
        }
        $buffer .= Serializer::int64($this->hash);
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
        $needCheck = (($flags & (1 << 0)) !== 0) ? true : null;
        $country = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $text = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($stream) : null;
        $hash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $hash,
            $needCheck,
            $country,
            $text
        );
    }
}