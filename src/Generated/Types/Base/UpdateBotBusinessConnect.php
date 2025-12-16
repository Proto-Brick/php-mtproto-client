<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotBusinessConnect
 */
final class UpdateBotBusinessConnect extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8ae5c97a;
    
    public string $predicate = 'updateBotBusinessConnect';
    
    /**
     * @param BotBusinessConnection $connection
     * @param int $qts
     */
    public function __construct(
        public readonly BotBusinessConnection $connection,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->connection->serialize();
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $connection = BotBusinessConnection::deserialize($stream);
        $qts = Deserializer::int32($stream);

        return new self(
            $connection,
            $qts
        );
    }
}