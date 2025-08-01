<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatForbidden
 */
final class ChatForbidden extends AbstractChat
{
    public const CONSTRUCTOR_ID = 1704108455;
    
    public string $_ = 'chatForbidden';
    
    /**
     * @param int $id
     * @param string $title
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->title);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $title = $deserializer->bytes($stream);
            return new self(
            $id,
            $title
        );
    }
}