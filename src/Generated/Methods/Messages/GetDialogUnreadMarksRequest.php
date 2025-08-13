<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDialogUnreadMarks
 */
final class GetDialogUnreadMarksRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x21202222;
    
    public string $predicate = 'messages.getDialogUnreadMarks';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogUnreadMarks';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractDialogPeer::class . '>';
    }
    /**
     * @param AbstractInputPeer|null $parentPeer
     */
    public function __construct(
        public readonly ?AbstractInputPeer $parentPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->parentPeer !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->parentPeer->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}