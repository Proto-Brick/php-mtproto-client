<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.reportMissingCode
 */
final class ReportMissingCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcb9deff6;
    
    public string $_ = 'auth.reportMissingCode';
    
    public function getMethodName(): string
    {
        return 'auth.reportMissingCode';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $mnc
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $mnc
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->phoneCodeHash);
        $buffer .= $serializer->bytes($this->mnc);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}