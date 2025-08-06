<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.clearAllDrafts
 */
final class ClearAllDraftsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7e58ee9c;
    
    public string $_ = 'messages.clearAllDrafts';
    
    public function getMethodName(): string
    {
        return 'messages.clearAllDrafts';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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