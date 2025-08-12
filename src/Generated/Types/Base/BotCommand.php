<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botCommand
 */
final class BotCommand extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc27ac8c7;
    
    public string $predicate = 'botCommand';
    
    /**
     * @param string $command
     * @param string $description
     */
    public function __construct(
        public readonly string $command,
        public readonly string $description
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->command);
        $buffer .= Serializer::bytes($this->description);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $command = Deserializer::bytes($stream);
        $description = Deserializer::bytes($stream);

        return new self(
            $command,
            $description
        );
    }
}