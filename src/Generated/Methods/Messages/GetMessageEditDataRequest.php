<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessageEditData;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getMessageEditData
 */
final class GetMessageEditDataRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfda68d36;
    
    public string $predicate = 'messages.getMessageEditData';
    
    public function getMethodName(): string
    {
        return 'messages.getMessageEditData';
    }
    
    public function getResponseClass(): string
    {
        return MessageEditData::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}