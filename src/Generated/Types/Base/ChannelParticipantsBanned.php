<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelParticipantsBanned
 */
final class ChannelParticipantsBanned extends AbstractChannelParticipantsFilter
{
    public const CONSTRUCTOR_ID = 0x1427a5e1;
    
    public string $predicate = 'channelParticipantsBanned';
    
    /**
     * @param string $q
     */
    public function __construct(
        public readonly string $q
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $q = Deserializer::bytes($stream);

        return new self(
            $q
        );
    }
}