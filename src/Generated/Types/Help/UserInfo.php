<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.userInfo
 */
final class UserInfo extends AbstractUserInfo
{
    public const CONSTRUCTOR_ID = 32192344;
    
    public string $_ = 'help.userInfo';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->message);
        $buffer .= $serializer->vectorOfObjects($this->entities);
        $buffer .= $serializer->bytes($this->author);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $message = $deserializer->bytes($stream);
        $entities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $author = $deserializer->bytes($stream);
        $date = $deserializer->int32($stream);
            return new self(
            $message,
            $entities,
            $author,
            $date
        );
    }
}