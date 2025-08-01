<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pollAnswerVoters
 */
final class PollAnswerVoters extends AbstractPollAnswerVoters
{
    public const CONSTRUCTOR_ID = 997055186;
    
    public string $_ = 'pollAnswerVoters';
    
    /**
     * @param string $option
     * @param int $voters
     * @param bool|null $chosen
     * @param bool|null $correct
     */
    public function __construct(
        public readonly string $option,
        public readonly int $voters,
        public readonly ?bool $chosen = null,
        public readonly ?bool $correct = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chosen) $flags |= (1 << 0);
        if ($this->correct) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->option);
        $buffer .= $serializer->int32($this->voters);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $chosen = ($flags & (1 << 0)) ? true : null;
        $correct = ($flags & (1 << 1)) ? true : null;
        $option = $deserializer->bytes($stream);
        $voters = $deserializer->int32($stream);
            return new self(
            $option,
            $voters,
            $chosen,
            $correct
        );
    }
}