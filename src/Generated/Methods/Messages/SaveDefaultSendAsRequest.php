<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.saveDefaultSendAs
 */
final class SaveDefaultSendAsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xccfddf96;
    
    public string $predicate = 'messages.saveDefaultSendAs';
    
    public function getMethodName(): string
    {
        return 'messages.saveDefaultSendAs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputPeer $sendAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputPeer $sendAs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->sendAs->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}