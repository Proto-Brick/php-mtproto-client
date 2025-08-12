<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/requestPeerTypeUser
 */
final class RequestPeerTypeUser extends AbstractRequestPeerType
{
    public const CONSTRUCTOR_ID = 0x5f3b8a00;
    
    public string $predicate = 'requestPeerTypeUser';
    
    /**
     * @param bool|null $bot
     * @param bool|null $premium
     */
    public function __construct(
        public readonly ?bool $bot = null,
        public readonly ?bool $premium = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bot !== null) $flags |= (1 << 0);
        if ($this->premium !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->bot ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= ($this->premium ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $bot = ($flags & (1 << 0)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $premium = ($flags & (1 << 1)) ? (Deserializer::int32($stream) === 0x997275b5) : null;

        return new self(
            $bot,
            $premium
        );
    }
}