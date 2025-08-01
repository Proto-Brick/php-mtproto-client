<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Premium\AbstractBoostsList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/premium.getUserBoosts
 */
final class GetUserBoostsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 965037343;
    
    public string $_ = 'premium.getUserBoosts';
    
    public function getMethodName(): string
    {
        return 'premium.getUserBoosts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBoostsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->userId->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}