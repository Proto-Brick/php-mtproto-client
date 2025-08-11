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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->semantics);
        $buffer .= Serializer::vectorOfInts($this->sources);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $semantics = Deserializer::bytes($stream);
        $sources = Deserializer::vectorOfInts($stream);
        return new self(
            $semantics,
            $sources
        );
    }
}