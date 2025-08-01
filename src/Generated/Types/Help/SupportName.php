<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.supportName
 */
final class SupportName extends AbstractSupportName
{
    public const CONSTRUCTOR_ID = 2349199817;
    
    public string $_ = 'help.supportName';
    
    /**
     * @param string $name
     */
    public function __construct(
        public readonly string $name
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->name);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $name = $deserializer->bytes($stream);
            return new self(
            $name
        );
    }
}