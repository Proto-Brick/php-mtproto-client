<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGift
 */
final class InputInvoiceStarGift extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 634962392;
    
    public string $_ = 'inputInvoiceStarGift';
    
    /**
     * @param AbstractInputUser $userId
     * @param int $giftId
     * @param bool|null $hideName
     * @param AbstractTextWithEntities|null $message
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $giftId,
        public readonly ?bool $hideName = null,
        public readonly ?AbstractTextWithEntities $message = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hideName) $flags |= (1 << 0);
        if ($this->message !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int64($this->giftId);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hideName = ($flags & (1 << 0)) ? true : null;
        $userId = AbstractInputUser::deserialize($deserializer, $stream);
        $giftId = $deserializer->int64($stream);
        $message = ($flags & (1 << 1)) ? AbstractTextWithEntities::deserialize($deserializer, $stream) : null;
            return new self(
            $userId,
            $giftId,
            $hideName,
            $message
        );
    }
}