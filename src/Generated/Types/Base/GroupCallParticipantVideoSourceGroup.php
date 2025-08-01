<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallParticipantVideoSourceGroup
 */
final class GroupCallParticipantVideoSourceGroup extends AbstractGroupCallParticipantVideoSourceGroup
{
    public const CONSTRUCTOR_ID = 3702593719;
    
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $semantics = $deserializer->bytes($stream);
        $sources = $deserializer->vectorOfInts($stream);
            return new self(
            $semantics,
            $sources
        );
    }
}