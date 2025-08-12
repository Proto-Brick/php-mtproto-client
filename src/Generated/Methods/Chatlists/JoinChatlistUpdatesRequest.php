<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.joinChatlistUpdates
 */
final class JoinChatlistUpdatesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe089f8f5;
    
    public string $predicate = 'chatlists.joinChatlistUpdates';
    
    public function getMethodName(): string
    {
        return 'chatlists.joinChatlistUpdates';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputChatlist $chatlist
     * @param list<AbstractInputPeer> $peers
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();
        $buffer .= Serializer::vectorOfObjects($this->peers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}