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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= $this->call->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $chatId = Deserializer::int64($stream);
        $call = AbstractGroupCall::deserialize($stream);
        return new self(
            $chatId,
            $call
        );
    }
}