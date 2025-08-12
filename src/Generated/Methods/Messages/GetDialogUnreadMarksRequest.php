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
    public const CONSTRUCTOR_ID = 0x22e24e22;
    
    public string $predicate = 'messages.getDialogUnreadMarks';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogUnreadMarks';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractDialogPeer::class . '>';
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