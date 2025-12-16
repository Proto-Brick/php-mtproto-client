<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/groupCallParticipantVideo
 */
final class GroupCallParticipantVideo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x67753ac8;
    
    public string $predicate = 'groupCallParticipantVideo';
    
    /**
     * @param string $endpoint
     * @param list<GroupCallParticipantVideoSourceGroup> $sourceGroups
     * @param true|null $paused
     * @param int|null $audioSource
     */
    public function __construct(
        public readonly string $endpoint,
        public readonly array $sourceGroups,
        public readonly ?true $paused = null,
        public readonly ?int $audioSource = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->paused) {
            $flags |= (1 << 0);
        }
        if ($this->audioSource !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->endpoint);
        $buffer .= Serializer::vectorOfObjects($this->sourceGroups);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->audioSource);
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
        $paused = (($flags & (1 << 0)) !== 0) ? true : null;
        $endpoint = Deserializer::bytes($stream);
        $sourceGroups = Deserializer::vectorOfObjects($stream, [GroupCallParticipantVideoSourceGroup::class, 'deserialize']);
        $audioSource = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $endpoint,
            $sourceGroups,
            $paused,
            $audioSource
        );
    }
}