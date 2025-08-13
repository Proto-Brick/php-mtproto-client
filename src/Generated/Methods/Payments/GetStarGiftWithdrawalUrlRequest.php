<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarGiftWithdrawalUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftWithdrawalUrl
 */
final class GetStarGiftWithdrawalUrlRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd06e93a8;
    
    public string $predicate = 'payments.getStarGiftWithdrawalUrl';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftWithdrawalUrl';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftWithdrawalUrl::class;
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param AbstractInputCheckPasswordSRP $password
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly AbstractInputCheckPasswordSRP $password
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        $buffer .= $this->password->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}