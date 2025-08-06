<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionInviteToGroupCall
 */
final class MessageActionInviteToGroupCall extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x502f92f7;
    
    public string $_ = 'messageActionInviteToGroupCall';
    
    /**
     * @param InputGroupCall $call
     * @param list<int> $users
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->vectorOfLongs($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $call = InputGroupCall::deserialize($deserializer, $stream);
        $users = $deserializer->vectorOfLongs($stream);
        return new self(
            $call,
            $users
        );
    }
}