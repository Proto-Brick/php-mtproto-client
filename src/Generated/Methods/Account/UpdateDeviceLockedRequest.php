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
    public const CONSTRUCTOR_ID = 0x38df3532;
    
    public string $predicate = 'account.updateDeviceLocked';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->period);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}