<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botCommand
 */
final class BotCommand extends AbstractBotCommand
{
    public const CONSTRUCTOR_ID = 3262826695;
    
    public string $_ = 'botCommand';
    
    /**
     * @param string $command
     * @param string $description
     */
    public function __construct(
        public readonly string $command,
        public readonly string $description
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->command);
        $buffer .= $serializer->bytes($this->description);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $command = $deserializer->bytes($stream);
        $description = $deserializer->bytes($stream);
            return new self(
            $command,
            $description
        );
    }
}