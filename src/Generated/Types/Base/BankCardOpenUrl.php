<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/bankCardOpenUrl
 */
final class BankCardOpenUrl extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf568028a;
    
    public string $predicate = 'bankCardOpenUrl';
    
    /**
     * @param string $url
     * @param string $name
     */
    public function __construct(
        public readonly string $url,
        public readonly string $name
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::bytes($this->name);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $url = Deserializer::bytes($stream);
        $name = Deserializer::bytes($stream);

        return new self(
            $url,
            $name
        );
    }
}