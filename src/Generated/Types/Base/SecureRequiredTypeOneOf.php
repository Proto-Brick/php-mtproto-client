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
    public const CONSTRUCTOR_ID = 0x27477b4;
    
    public string $predicate = 'secureRequiredTypeOneOf';
    
    /**
     * @param list<AbstractSecureRequiredType> $types
     */
    public function __construct(
        public readonly array $types
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->types);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $types = Deserializer::vectorOfObjects($stream, [AbstractSecureRequiredType::class, 'deserialize']);

        return new self(
            $types
        );
    }
}