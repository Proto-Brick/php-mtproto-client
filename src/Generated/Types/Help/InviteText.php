<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.inviteText
 */
final class InviteText extends AbstractInviteText
{
    public const CONSTRUCTOR_ID = 415997816;
    
    public string $_ = 'help.inviteText';
    
    /**
     * @param string $message
     */
    public function __construct(
        public readonly string $message
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->message);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $message = $deserializer->bytes($stream);
            return new self(
            $message
        );
    }
}