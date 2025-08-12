<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatAdminRights;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.editAdmin
 */
final class EditAdminRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd33c8902;
    
    public string $predicate = 'channels.editAdmin';
    
    public function getMethodName(): string
    {
        return 'channels.editAdmin';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputUser $userId
     * @param ChatAdminRights $adminRights
     * @param string $rank
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputUser $userId,
        public readonly ChatAdminRights $adminRights,
        public readonly string $rank
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->userId->serialize();
        $buffer .= $this->adminRights->serialize();
        $buffer .= Serializer::bytes($this->rank);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}