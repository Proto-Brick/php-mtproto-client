<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputClientProxy
 */
final class InputClientProxy extends AbstractInputClientProxy
{
    public const CONSTRUCTOR_ID = 1968737087;
    
    public string $_ = 'inputClientProxy';
    
    /**
     * @param string $address
     * @param int $port
     */
    public function __construct(
        public readonly string $address,
        public readonly int $port
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->address);
        $buffer .= $serializer->int32($this->port);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $address = $deserializer->bytes($stream);
        $port = $deserializer->int32($stream);
            return new self(
            $address,
            $port
        );
    }
}