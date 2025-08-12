<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.hideChatlistUpdates
 */
final class HideChatlistUpdatesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x66e486fb;
    
    public string $predicate = 'chatlists.hideChatlistUpdates';
    
    public function getMethodName(): string
    {
        return 'chatlists.hideChatlistUpdates';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputChatlist $chatlist
     */
    public function __construct(
        public readonly InputChatlist $chatlist
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}