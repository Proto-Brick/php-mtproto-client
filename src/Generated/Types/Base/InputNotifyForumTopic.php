<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputNotifyForumTopic
 */
final class InputNotifyForumTopic extends AbstractInputNotifyPeer
{
    public const CONSTRUCTOR_ID = 1548122514;
    
    public string $_ = 'inputNotifyForumTopic';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $topMsgId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->topMsgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($deserializer, $stream);
        $topMsgId = $deserializer->int32($stream);
            return new self(
            $peer,
            $topMsgId
        );
    }
}