<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.resetPasswordRequestedWait
 */
final class ResetPasswordRequestedWait extends AbstractResetPasswordResult
{
    public const CONSTRUCTOR_ID = 0xe9effc7d;
    
    public string $predicate = 'account.resetPasswordRequestedWait';
    
    /**
     * @param int $untilDate
     */
    public function __construct(
        public readonly int $untilDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->untilDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $untilDate = Deserializer::int32($__payload, $__offset);

        return new self(
            $untilDate
        );
    }
}