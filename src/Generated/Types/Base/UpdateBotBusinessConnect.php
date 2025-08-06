<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotBusinessConnect
 */
final class UpdateBotBusinessConnect extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8ae5c97a;
    
    public string $_ = 'updateBotBusinessConnect';
    
    /**
     * @param BotBusinessConnection $connection
     * @param int $qts
     */
    public function __construct(
        public readonly BotBusinessConnection $connection,
        public readonly int $qts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->connection->serialize($serializer);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $connection = BotBusinessConnection::deserialize($deserializer, $stream);
        $qts = $deserializer->int32($stream);
        return new self(
            $connection,
            $qts
        );
    }
}