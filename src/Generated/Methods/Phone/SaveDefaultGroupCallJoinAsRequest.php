<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.saveDefaultGroupCallJoinAs
 */
final class SaveDefaultGroupCallJoinAsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1465786252;
    
    public string $_ = 'phone.saveDefaultGroupCallJoinAs';
    
    public function getMethodName(): string
    {
        return 'phone.saveDefaultGroupCallJoinAs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputPeer $joinAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputPeer $joinAs
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->joinAs->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}