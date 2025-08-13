<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.sendConferenceCallBroadcast
 */
final class SendConferenceCallBroadcastRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc6701900;
    
    public string $predicate = 'phone.sendConferenceCallBroadcast';
    
    public function getMethodName(): string
    {
        return 'phone.sendConferenceCallBroadcast';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param string $block
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly string $block
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::bytes($this->block);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}