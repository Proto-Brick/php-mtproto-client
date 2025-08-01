<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.unregisterDevice
 */
final class UnregisterDeviceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1779249670;
    
    public string $_ = 'account.unregisterDevice';
    
    public function getMethodName(): string
    {
        return 'account.unregisterDevice';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $tokenType
     * @param string $token
     * @param list<int> $otherUids
     */
    public function __construct(
        public readonly int $tokenType,
        public readonly string $token,
        public readonly array $otherUids
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->tokenType);
        $buffer .= $serializer->bytes($this->token);
        $buffer .= $serializer->vectorOfLongs($this->otherUids);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}