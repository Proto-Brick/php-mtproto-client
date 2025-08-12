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
    
    public string $predicate = 'help.termsOfServiceUpdate';
    
    /**
     * @param int $expires
     * @param TermsOfService $termsOfService
     */
    public function __construct(
        public readonly int $expires,
        public readonly TermsOfService $termsOfService
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->expires);
        $buffer .= $this->termsOfService->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $expires = Deserializer::int32($stream);
        $termsOfService = TermsOfService::deserialize($stream);

        return new self(
            $expires,
            $termsOfService
        );
    }
}