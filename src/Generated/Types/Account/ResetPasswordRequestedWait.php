<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.resetPasswordRequestedWait
 */
final class ResetPasswordRequestedWait extends AbstractResetPasswordResult
{
    public const CONSTRUCTOR_ID = 0xe9effc7d;
    
    public string $_ = 'account.resetPasswordRequestedWait';
    
    /**
     * @param int $untilDate
     */
    public function __construct(
        public readonly int $untilDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->untilDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $untilDate = $deserializer->int32($stream);
        return new self(
            $untilDate
        );
    }
}