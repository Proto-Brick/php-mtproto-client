<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.editCreator
 */
final class EditCreatorRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8f38cd1f;
    
    public string $predicate = 'channels.editCreator';
    
    public function getMethodName(): string
    {
        return 'channels.editCreator';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputUser $userId
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputUser $userId,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->userId->serialize();
        $buffer .= $this->password->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}