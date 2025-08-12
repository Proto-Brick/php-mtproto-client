<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputCollectibleUsername
 */
final class InputCollectibleUsername extends AbstractInputCollectible
{
    public const CONSTRUCTOR_ID = 0xe39460a9;
    
    public string $predicate = 'inputCollectibleUsername';
    
    /**
     * @param string $username
     */
    public function __construct(
        public readonly string $username
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->username);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $username = Deserializer::bytes($stream);

        return new self(
            $username
        );
    }
}