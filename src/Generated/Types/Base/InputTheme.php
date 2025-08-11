<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputTheme
 */
final class InputTheme extends AbstractInputTheme
{
    public const CONSTRUCTOR_ID = 0x3c5693e9;
    
    public string $_ = 'inputTheme';
    
    /**
     * @param int $id
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        return new self(
            $id,
            $accessHash
        );
    }
}