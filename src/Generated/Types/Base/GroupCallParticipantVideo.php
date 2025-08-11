<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallParticipantVideo
 */
final class GroupCallParticipantVideo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x67753ac8;
    
    public string $_ = 'groupCallParticipantVideo';
    
    /**
     * @param string $endpoint
     * @param list<GroupCallParticipantVideoSourceGroup> $sourceGroups
     * @param bool|null $paused
     * @param int|null $audioSource
     */
    public function __construct(
        public readonly string $endpoint,
        public readonly array $sourceGroups,
        public readonly ?bool $paused = null,
        public readonly ?int $audioSource = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->paused) $flags |= (1 << 0);
        if ($this->audioSource !== null) $flags |= (1 << 1);
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
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $paused = ($flags & (1 << 0)) ? true : null;
        $endpoint = Deserializer::bytes($stream);
        $sourceGroups = Deserializer::vectorOfObjects($stream, [GroupCallParticipantVideoSourceGroup::class, 'deserialize']);
        $audioSource = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        return new self(
            $endpoint,
            $sourceGroups,
            $paused,
            $audioSource
        );
    }
}