<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateDeviceLocked
 */
final class UpdateDeviceLockedRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 954152242;
    
    public string $_ = 'account.updateDeviceLocked';
    
    public function getMethodName(): string
    {
        return 'account.updateDeviceLocked';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $period
     */
    public function __construct(
        public readonly int $period
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->period);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}