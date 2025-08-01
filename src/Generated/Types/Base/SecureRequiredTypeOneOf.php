<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureRequiredTypeOneOf
 */
final class SecureRequiredTypeOneOf extends AbstractSecureRequiredType
{
    public const CONSTRUCTOR_ID = 41187252;
    
    public string $_ = 'secureRequiredTypeOneOf';
    
    /**
     * @param list<AbstractSecureRequiredType> $types
     */
    public function __construct(
        public readonly array $types
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->types);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $types = $deserializer->vectorOfObjects($stream, [AbstractSecureRequiredType::class, 'deserialize']);
            return new self(
            $types
        );
    }
}