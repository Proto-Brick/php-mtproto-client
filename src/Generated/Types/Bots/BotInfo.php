<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Bots;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/bots.botInfo
 */
final class BotInfo extends AbstractBotInfo
{
    public const CONSTRUCTOR_ID = 3903288752;
    
    public string $_ = 'bots.botInfo';
    
    /**
     * @param string $name
     * @param string $about
     * @param string $description
     */
    public function __construct(
        public readonly string $name,
        public readonly string $about,
        public readonly string $description
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->name);
        $buffer .= $serializer->bytes($this->about);
        $buffer .= $serializer->bytes($this->description);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $name = $deserializer->bytes($stream);
        $about = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
            return new self(
            $name,
            $about,
            $description
        );
    }
}