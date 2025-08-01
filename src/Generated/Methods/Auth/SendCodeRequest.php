<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractCodeSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.sendCode
 */
final class SendCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2792825935;
    
    public string $_ = 'auth.sendCode';
    
    public function getMethodName(): string
    {
        return 'auth.sendCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $phoneNumber
     * @param int $apiId
     * @param string $apiHash
     * @param AbstractCodeSettings $settings
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly AbstractCodeSettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->int32($this->apiId);
        $buffer .= $serializer->bytes($this->apiHash);
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}