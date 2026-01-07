<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Smsjobs;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/smsjobs.eligibleToJoin
 */
final class EligibilityToJoin extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdc8b44cf;
    
    public string $predicate = 'smsjobs.eligibleToJoin';
    
    /**
     * @param string $termsUrl
     * @param int $monthlySentSms
     */
    public function __construct(
        public readonly string $termsUrl,
        public readonly int $monthlySentSms
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->termsUrl);
        $buffer .= Serializer::int32($this->monthlySentSms);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $termsUrl = Deserializer::bytes($__payload, $__offset);
        $monthlySentSms = Deserializer::int32($__payload, $__offset);

        return new self(
            $termsUrl,
            $monthlySentSms
        );
    }
}