<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.affectedMessages
 */
final class AffectedMessages extends TlObject
{
    public const CONSTRUCTOR_ID = 0x84d19185;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        return new self(
            $pts,
            $ptsCount
        );
    }
}