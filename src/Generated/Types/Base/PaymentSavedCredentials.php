<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/paymentSavedCredentialsCard
 */
final class PaymentSavedCredentials extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcdc27a1f;
    
    public string $predicate = 'paymentSavedCredentialsCard';
    
    /**
     * @param string $id
     * @param string $title
     */
    public function __construct(
        public readonly string $id,
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);

        return new self(
            $id,
            $title
        );
    }
}