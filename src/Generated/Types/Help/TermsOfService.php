<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/help.termsOfService
 */
final class TermsOfService extends TlObject
{
    public const CONSTRUCTOR_ID = 0x780a0310;
    
    public string $predicate = 'help.termsOfService';
    
    /**
     * @param array $id
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     * @param true|null $popup
     * @param int|null $minAgeConfirm
     */
    public function __construct(
        public readonly array $id,
        public readonly string $text,
        public readonly array $entities,
        public readonly ?true $popup = null,
        public readonly ?int $minAgeConfirm = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->popup) {
            $flags |= (1 << 0);
        }
        if ($this->minAgeConfirm !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::serializeDataJSON($this->id);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::vectorOfObjects($this->entities);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->minAgeConfirm);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $popup = (($flags & (1 << 0)) !== 0) ? true : null;
        $id = Deserializer::deserializeDataJSON($stream);
        $text = Deserializer::bytes($stream);
        $entities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $minAgeConfirm = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $id,
            $text,
            $entities,
            $popup,
            $minAgeConfirm
        );
    }
}