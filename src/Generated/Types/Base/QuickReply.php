<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/quickReply
 */
final class QuickReply extends TlObject
{
    public const CONSTRUCTOR_ID = 0x697102b;
    
    public string $predicate = 'quickReply';
    
    /**
     * @param int $shortcutId
     * @param string $shortcut
     * @param int $topMessage
     * @param int $count
     */
    public function __construct(
        public readonly int $shortcutId,
        public readonly string $shortcut,
        public readonly int $topMessage,
        public readonly int $count
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::bytes($this->shortcut);
        $buffer .= Serializer::int32($this->topMessage);
        $buffer .= Serializer::int32($this->count);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $shortcutId = Deserializer::int32($stream);
        $shortcut = Deserializer::bytes($stream);
        $topMessage = Deserializer::int32($stream);
        $count = Deserializer::int32($stream);

        return new self(
            $shortcutId,
            $shortcut,
            $topMessage,
            $count
        );
    }
}