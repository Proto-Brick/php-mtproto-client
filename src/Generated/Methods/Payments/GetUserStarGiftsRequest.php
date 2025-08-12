<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Payments\UserStarGifts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getUserStarGifts
 */
final class GetUserStarGiftsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5e72c7e1;
    
    public string $predicate = 'payments.getUserStarGifts';
    
    public function getMethodName(): string
    {
        return 'payments.getUserStarGifts';
    }
    
    public function getResponseClass(): string
    {
        return UserStarGifts::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}