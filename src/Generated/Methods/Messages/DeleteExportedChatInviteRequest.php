<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.deleteExportedChatInvite
 */
final class DeleteExportedChatInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd464a42b;
    
    public string $predicate = 'messages.deleteExportedChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.deleteExportedChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $link
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $link
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->link);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}