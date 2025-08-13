<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoicePremiumGiftStars
 */
final class InputInvoicePremiumGiftStars extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0xdabab2ef;
    
    public string $predicate = 'inputInvoicePremiumGiftStars';
    
    /**
     * @param AbstractInputUser $userId
     * @param int $months
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $months,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->message !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= $this->message->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $userId = AbstractInputUser::deserialize($stream);
        $months = Deserializer::int32($stream);
        $message = ($flags & (1 << 0)) ? TextWithEntities::deserialize($stream) : null;

        return new self(
            $userId,
            $months,
            $message
        );
    }
}