<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractFactCheck;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getFactCheck
 */
final class GetFactCheckRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3117270510;
    
    public string $_ = 'messages.getFactCheck';
    
    public function getMethodName(): string
    {
        return 'messages.getFactCheck';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFactCheck::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $msgId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->msgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}