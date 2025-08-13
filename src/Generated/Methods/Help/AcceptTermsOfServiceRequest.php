<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.acceptTermsOfService
 */
final class AcceptTermsOfServiceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xee72f79a;
    
    public string $predicate = 'help.acceptTermsOfService';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->id);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}