<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChatlist;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\AbstractChatlistUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.getChatlistUpdates
 */
final class GetChatlistUpdatesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2302776609;
    
    public string $_ = 'chatlists.getChatlistUpdates';
    
    public function getMethodName(): string
    {
        return 'chatlists.getChatlistUpdates';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChatlistUpdates::class;
    }
    /**
     * @param AbstractInputChatlist $chatlist
     */
    public function __construct(
        public readonly AbstractInputChatlist $chatlist
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}