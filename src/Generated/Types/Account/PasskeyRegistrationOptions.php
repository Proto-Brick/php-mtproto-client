<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.passkeyRegistrationOptions
 */
final class PasskeyRegistrationOptions extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe16b5ce1;
    
    public string $predicate = 'account.passkeyRegistrationOptions';
    
    /**
     * @param array $options
     */
    public function __construct(
        public readonly array $options
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->options);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $options = Deserializer::deserializeDataJSON($__payload, $__offset);

        return new self(
            $options
        );
    }
}