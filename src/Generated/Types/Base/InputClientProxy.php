<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputClientProxy
 */
final class InputClientProxy extends TlObject
{
    public const CONSTRUCTOR_ID = 0x75588b3f;
    
    public string $predicate = 'inputClientProxy';
    
    /**
     * @param string $address
     * @param int $port
     */
    public function __construct(
        public readonly string $address,
        public readonly int $port
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->address);
        $buffer .= Serializer::int32($this->port);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $address = Deserializer::bytes($stream);
        $port = Deserializer::int32($stream);

        return new self(
            $address,
            $port
        );
    }
}