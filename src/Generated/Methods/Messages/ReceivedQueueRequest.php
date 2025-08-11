<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.receivedQueue
 */
final class ReceivedQueueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x55a5bb66;
    
    public string $_ = 'messages.receivedQueue';
    
    public function getMethodName(): string
    {
        return 'messages.receivedQueue';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param int $maxQts
     */
    public function __construct(
        public readonly int $maxQts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->maxQts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}