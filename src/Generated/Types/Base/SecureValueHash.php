<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureValueHash
 */
final class SecureValueHash extends AbstractSecureValueHash
{
    public const CONSTRUCTOR_ID = 3978218928;
    
    public string $_ = 'secureValueHash';
    
    /**
     * @param AbstractSecureValueType $type
     * @param string $hash
     */
    public function __construct(
        public readonly AbstractSecureValueType $type,
        public readonly string $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize($serializer);
        $buffer .= $serializer->bytes($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = AbstractSecureValueType::deserialize($deserializer, $stream);
        $hash = $deserializer->bytes($stream);
            return new self(
            $type,
            $hash
        );
    }
}