<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsGiftOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsGiftOptions
 */
final class GetStarsGiftOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3553192904;
    
    public string $_ = 'payments.getStarsGiftOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsGiftOptions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarsGiftOption::class;
    }
    /**
     * @param AbstractInputUser|null $userId
     */
    public function __construct(
        public readonly ?AbstractInputUser $userId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->userId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->userId->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}