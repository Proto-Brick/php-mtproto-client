<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceChatInviteSubscription
 */
final class InputInvoiceChatInviteSubscription extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x34e793f1;
    
    public string $_ = 'inputInvoiceChatInviteSubscription';
    
    /**
     * @param string $hash
     */
    public function __construct(
        public readonly string $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->bytes($stream);
        return new self(
            $hash
        );
    }
}