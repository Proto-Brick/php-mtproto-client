<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.setBoostsToUnblockRestrictions
 */
final class SetBoostsToUnblockRestrictionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xad399cee;
    
    public string $_ = 'channels.setBoostsToUnblockRestrictions';
    
    public function getMethodName(): string
    {
        return 'channels.setBoostsToUnblockRestrictions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $boosts
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $boosts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->boosts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}