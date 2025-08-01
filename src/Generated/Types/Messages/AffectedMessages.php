<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.affectedMessages
 */
final class AffectedMessages extends AbstractAffectedMessages
{
    public const CONSTRUCTOR_ID = 2228326789;
    
    public string $_ = 'messages.affectedMessages';
    
    /**
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
            return new self(
            $pts,
            $ptsCount
        );
    }
}