<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftUpgradePreview;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftUpgradePreview
 */
final class GetStarGiftUpgradePreviewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9c9abcb1;
    
    public string $predicate = 'payments.getStarGiftUpgradePreview';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftUpgradePreview';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftUpgradePreview::class;
    }
    /**
     * @param int $giftId
     */
    public function __construct(
        public readonly int $giftId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->giftId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}