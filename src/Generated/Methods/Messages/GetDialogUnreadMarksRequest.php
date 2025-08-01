<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDialogUnreadMarks
 */
final class GetDialogUnreadMarksRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 585256482;
    
    public string $_ = 'messages.getDialogUnreadMarks';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogUnreadMarks';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDialogPeer::class;
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