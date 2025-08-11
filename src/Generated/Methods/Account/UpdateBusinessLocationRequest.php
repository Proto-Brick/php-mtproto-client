<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateBusinessLocation
 */
final class UpdateBusinessLocationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9e6b131a;
    
    public string $_ = 'account.updateBusinessLocation';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessLocation';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputGeoPoint|null $geoPoint
     * @param string|null $address
     */
    public function __construct(
        public readonly ?AbstractInputGeoPoint $geoPoint = null,
        public readonly ?string $address = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geoPoint !== null) $flags |= (1 << 1);
        if ($this->address !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $this->geoPoint->serialize();
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->address);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}