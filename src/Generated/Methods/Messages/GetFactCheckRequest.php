<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\FactCheck;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getFactCheck
 */
final class GetFactCheckRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb9cdc5ee;
    
    public string $_ = 'messages.getFactCheck';
    
    public function getMethodName(): string
    {
        return 'messages.getFactCheck';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FactCheck::class . '>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->msgId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}