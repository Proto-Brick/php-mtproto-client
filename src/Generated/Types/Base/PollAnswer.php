<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pollAnswer
 */
final class PollAnswer extends AbstractPollAnswer
{
    public const CONSTRUCTOR_ID = 4279689930;
    
    public string $_ = 'pollAnswer';
    
    /**
     * @param AbstractTextWithEntities $text
     * @param string $option
     */
    public function __construct(
        public readonly AbstractTextWithEntities $text,
        public readonly string $option
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize($serializer);
        $buffer .= $serializer->bytes($this->option);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = AbstractTextWithEntities::deserialize($deserializer, $stream);
        $option = $deserializer->bytes($stream);
            return new self(
            $text,
            $option
        );
    }
}