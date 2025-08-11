<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getCommonChats
 */
final class GetCommonChatsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe40ca104;
    
    public string $_ = 'messages.getCommonChats';
    
    public function getMethodName(): string
    {
        return 'messages.getCommonChats';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $maxId
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $maxId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int64($this->maxId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}