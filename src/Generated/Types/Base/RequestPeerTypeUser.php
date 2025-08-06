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
    
    public string $_ = 'requestPeerTypeUser';
    
    /**
     * @param bool|null $bot
     * @param bool|null $premium
     */
    public function __construct(
        public readonly ?bool $bot = null,
        public readonly ?bool $premium = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bot !== null) $flags |= (1 << 0);
        if ($this->premium !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= ($this->bot ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= ($this->premium ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $bot = ($flags & (1 << 0)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $premium = ($flags & (1 << 1)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        return new self(
            $bot,
            $premium
        );
    }
}