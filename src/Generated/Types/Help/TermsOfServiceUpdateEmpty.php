<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.termsOfServiceUpdateEmpty
 */
final class TermsOfServiceUpdateEmpty extends AbstractTermsOfServiceUpdate
{
    public const CONSTRUCTOR_ID = 0xe3309f7f;
    
    public string $_ = 'help.termsOfServiceUpdateEmpty';
    
    /**
     * @param int $expires
     */
    public function __construct(
        public readonly int $expires
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->expires);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $expires = $deserializer->int32($stream);
        return new self(
            $expires
        );
    }
}