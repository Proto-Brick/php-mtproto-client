<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionSecureValuesSent
 */
final class MessageActionSecureValuesSent extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 3646710100;
    
    public string $_ = 'messageActionSecureValuesSent';
    
    /**
     * @param list<AbstractSecureValueType> $types
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
        $types = $deserializer->vectorOfObjects($stream, [AbstractSecureValueType::class, 'deserialize']);
            return new self(
            $types
        );
    }
}