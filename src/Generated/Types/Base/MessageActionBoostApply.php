<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionBoostApply
 */
final class MessageActionBoostApply extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 3422726765;
    
    public string $_ = 'messageActionBoostApply';
    
    /**
     * @param int $boosts
     */
    public function __construct(
        public readonly int $boosts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->boosts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $boosts = $deserializer->int32($stream);
            return new self(
            $boosts
        );
    }
}