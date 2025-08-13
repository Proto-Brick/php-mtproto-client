<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.paidMessagesRevenue
 */
final class PaidMessagesRevenue extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1e109708;
    
    public string $predicate = 'account.paidMessagesRevenue';
    
    /**
     * @param int $starsAmount
     */
    public function __construct(
        public readonly int $starsAmount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->starsAmount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $starsAmount = Deserializer::int64($stream);

        return new self(
            $starsAmount
        );
    }
}