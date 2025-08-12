<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getChatsToSend
 */
final class GetChatsToSendRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa56a8b60;
    
    public string $predicate = 'stories.getChatsToSend';
    
    public function getMethodName(): string
    {
        return 'stories.getChatsToSend';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}