<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonSwitchInline
 */
final class KeyboardButtonSwitchInline extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x93b9fbb5;
    
    public string $_ = 'keyboardButtonSwitchInline';
    
    /**
     * @param string $text
     * @param string $query
     * @param bool|null $samePeer
     * @param list<AbstractInlineQueryPeerType>|null $peerTypes
     */
    public function __construct(
        public readonly string $text,
        public readonly string $query,
        public readonly ?bool $samePeer = null,
        public readonly ?array $peerTypes = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->samePeer) $flags |= (1 << 0);
        if ($this->peerTypes !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->bytes($this->query);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->peerTypes);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $samePeer = ($flags & (1 << 0)) ? true : null;
        $text = $deserializer->bytes($stream);
        $query = $deserializer->bytes($stream);
        $peerTypes = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractInlineQueryPeerType::class, 'deserialize']) : null;
        return new self(
            $text,
            $query,
            $samePeer,
            $peerTypes
        );
    }
}