<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractTermsOfServiceUpdate;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getTermsOfServiceUpdate
 */
final class GetTermsOfServiceUpdateRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 749019089;
    
    public string $_ = 'help.getTermsOfServiceUpdate';
    
    public function getMethodName(): string
    {
        return 'help.getTermsOfServiceUpdate';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTermsOfServiceUpdate::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}