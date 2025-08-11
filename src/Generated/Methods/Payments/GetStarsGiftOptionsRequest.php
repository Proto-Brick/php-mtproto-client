<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsGiftOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsGiftOptions
 */
final class GetStarsGiftOptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd3c96bc8;
    
    public string $_ = 'payments.getStarsGiftOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsGiftOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . StarsGiftOption::class . '>';
    }
    /**
     * @param AbstractInputUser|null $userId
     */
    public function __construct(
        public readonly ?AbstractInputUser $userId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->userId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->userId->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}