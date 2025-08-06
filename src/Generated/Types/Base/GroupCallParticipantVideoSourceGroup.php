<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallParticipantVideoSourceGroup
 */
final class GroupCallParticipantVideoSourceGroup extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdcb118b7;
    
    public string $_ = 'groupCallParticipantVideoSourceGroup';
    
    /**
     * @param string $semantics
     * @param list<int> $sources
     */
    public function __construct(
        public readonly string $semantics,
        public readonly array $sources
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->semantics);
        $buffer .= $serializer->vectorOfInts($this->sources);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $semantics = $deserializer->bytes($stream);
        $sources = $deserializer->vectorOfInts($stream);
        return new self(
            $semantics,
            $sources
        );
    }
}