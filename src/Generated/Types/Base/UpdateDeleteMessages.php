<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDeleteMessages
 */
final class UpdateDeleteMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2718806245;
    
    public string $_ = 'updateDeleteMessages';
    
    /**
     * @param list<int> $messages
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly array $messages,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfInts($this->messages);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $messages = $deserializer->vectorOfInts($stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
            return new self(
            $messages,
            $pts,
            $ptsCount
        );
    }
}