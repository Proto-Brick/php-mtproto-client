<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChatInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.checkChatInvite
 */
final class CheckChatInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3eadb1bb;
    
    public string $predicate = 'messages.checkChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.checkChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChatInvite::class;
    }
    /**
     * @param string $hash
     */
    public function __construct(
        public readonly string $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}