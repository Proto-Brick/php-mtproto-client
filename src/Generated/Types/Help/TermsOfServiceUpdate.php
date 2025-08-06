<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.termsOfServiceUpdate
 */
final class TermsOfServiceUpdate extends AbstractTermsOfServiceUpdate
{
    public const CONSTRUCTOR_ID = 0x28ecf961;
    
    public string $_ = 'help.termsOfServiceUpdate';
    
    /**
     * @param int $expires
     * @param TermsOfService $termsOfService
     */
    public function __construct(
        public readonly int $expires,
        public readonly TermsOfService $termsOfService
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->expires);
        $buffer .= $this->termsOfService->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $expires = $deserializer->int32($stream);
        $termsOfService = TermsOfService::deserialize($deserializer, $stream);
        return new self(
            $expires,
            $termsOfService
        );
    }
}