<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.joinChatlistInvite
 */
final class JoinChatlistInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa6b1e39a;
    
    public string $_ = 'chatlists.joinChatlistInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.joinChatlistInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param string $slug
     * @param list<AbstractInputPeer> $peers
     */
    public function __construct(
        public readonly string $slug,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}