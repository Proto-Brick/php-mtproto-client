<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botPreparedInlineMessage
 */
final class BotPreparedInlineMessage extends AbstractBotPreparedInlineMessage
{
    public const CONSTRUCTOR_ID = 2395931921;
    
    public string $_ = 'messages.botPreparedInlineMessage';
    
    /**
     * @param string $id
     * @param int $expireDate
     */
    public function __construct(
        public readonly string $id,
        public readonly int $expireDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->int32($this->expireDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $expireDate = $deserializer->int32($stream);
            return new self(
            $id,
            $expireDate
        );
    }
}