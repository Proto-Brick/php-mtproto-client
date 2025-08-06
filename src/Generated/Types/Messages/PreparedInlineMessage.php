<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInlineQueryPeerType;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.preparedInlineMessage
 */
final class PreparedInlineMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff57708d;
    
    public string $_ = 'messages.preparedInlineMessage';
    
    /**
     * @param int $queryId
     * @param AbstractBotInlineResult $result
     * @param list<AbstractInlineQueryPeerType> $peerTypes
     * @param int $cacheTime
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $queryId,
        public readonly AbstractBotInlineResult $result,
        public readonly array $peerTypes,
        public readonly int $cacheTime,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $this->result->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->peerTypes);
        $buffer .= $serializer->int32($this->cacheTime);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $queryId = $deserializer->int64($stream);
        $result = AbstractBotInlineResult::deserialize($deserializer, $stream);
        $peerTypes = $deserializer->vectorOfObjects($stream, [AbstractInlineQueryPeerType::class, 'deserialize']);
        $cacheTime = $deserializer->int32($stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $queryId,
            $result,
            $peerTypes,
            $cacheTime,
            $users
        );
    }
}