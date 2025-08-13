<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.userInfo
 */
final class UserInfo extends AbstractUserInfo
{
    public const CONSTRUCTOR_ID = 0x1eb3758;
    
    public string $predicate = 'help.userInfo';
    
    /**
     * @param string $message
     * @param list<AbstractMessageEntity> $entities
     * @param string $author
     * @param int $date
     */
    public function __construct(
        public readonly string $message,
        public readonly array $entities,
        public readonly string $author,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->message);
        $buffer .= Serializer::vectorOfObjects($this->entities);
        $buffer .= Serializer::bytes($this->author);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $message = Deserializer::bytes($stream);
        $entities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $author = Deserializer::bytes($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $message,
            $entities,
            $author,
            $date
        );
    }
}