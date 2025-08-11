<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pollAnswer
 */
final class PollAnswer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff16e2ca;
    
    public string $_ = 'pollAnswer';
    
    /**
     * @param TextWithEntities $text
     * @param string $option
     */
    public function __construct(
        public readonly TextWithEntities $text,
        public readonly string $option
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->option);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $text = TextWithEntities::deserialize($stream);
        $option = Deserializer::bytes($stream);
        return new self(
            $text,
            $option
        );
    }
}