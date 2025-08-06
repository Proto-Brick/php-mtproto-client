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
    
    public string $_ = 'quickReply';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->shortcutId);
        $buffer .= $serializer->bytes($this->shortcut);
        $buffer .= $serializer->int32($this->topMessage);
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $shortcutId = $deserializer->int32($stream);
        $shortcut = $deserializer->bytes($stream);
        $topMessage = $deserializer->int32($stream);
        $count = $deserializer->int32($stream);
        return new self(
            $shortcutId,
            $shortcut,
            $topMessage,
            $count
        );
    }
}