<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/paymentCharge
 */
final class PaymentCharge extends TlObject
{
    public const CONSTRUCTOR_ID = 0xea02c27e;
    
    public string $predicate = 'paymentCharge';
    
    /**
     * @param string $id
     * @param string $providerChargeId
     */
    public function __construct(
        public readonly string $id,
        public readonly string $providerChargeId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->providerChargeId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($stream);
        $providerChargeId = Deserializer::bytes($stream);

        return new self(
            $id,
            $providerChargeId
        );
    }
}