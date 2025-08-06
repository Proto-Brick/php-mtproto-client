<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Bots;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/bots.botInfo
 */
final class BotInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe8a775b0;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

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