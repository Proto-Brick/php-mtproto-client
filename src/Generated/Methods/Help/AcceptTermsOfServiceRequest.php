<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.acceptTermsOfService
 */
final class AcceptTermsOfServiceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 4000511898;
    
    public string $_ = 'help.acceptTermsOfService';
    
    public function getMethodName(): string
    {
        return 'help.acceptTermsOfService';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param array $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= (new DataJSON(json_encode($this->id)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}