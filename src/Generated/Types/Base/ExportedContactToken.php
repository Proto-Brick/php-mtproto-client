<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/exportedContactToken
 */
final class ExportedContactToken extends TlObject
{
    public const CONSTRUCTOR_ID = 0x41bf109b;
    
    public string $_ = 'exportedContactToken';
    
    /**
     * @param string $url
     * @param int $expires
     */
    public function __construct(
        public readonly string $url,
        public readonly int $expires
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->expires);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $url = Deserializer::bytes($stream);
        $expires = Deserializer::int32($stream);
        return new self(
            $url,
            $expires
        );
    }
}