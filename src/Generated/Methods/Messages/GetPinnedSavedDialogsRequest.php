<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedDialogs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getPinnedSavedDialogs
 */
final class GetPinnedSavedDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3594360032;
    
    public string $_ = 'messages.getPinnedSavedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPinnedSavedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedDialogs::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}