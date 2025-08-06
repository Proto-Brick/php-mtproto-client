<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.resetPasswordFailedWait
 */
final class ResetPasswordFailedWait extends AbstractResetPasswordResult
{
    public const CONSTRUCTOR_ID = 0xe3779861;
    
    public string $_ = 'account.resetPasswordFailedWait';
    
    /**
     * @param int $retryDate
     */
    public function __construct(
        public readonly int $retryDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->retryDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $retryDate = $deserializer->int32($stream);
        return new self(
            $retryDate
        );
    }
}