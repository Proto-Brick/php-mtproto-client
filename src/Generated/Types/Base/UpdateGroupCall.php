<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateGroupCall
 */
final class UpdateGroupCall extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x14b24500;
    
    public string $_ = 'updateGroupCall';
    
    /**
     * @param int $chatId
     * @param AbstractGroupCall $call
     */
    public function __construct(
        public readonly int $chatId,
        public readonly AbstractGroupCall $call
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $this->call->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chatId = $deserializer->int64($stream);
        $call = AbstractGroupCall::deserialize($deserializer, $stream);
        return new self(
            $chatId,
            $call
        );
    }
}