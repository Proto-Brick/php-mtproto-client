<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBusinessWorkHours;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateBusinessWorkHours
 */
final class UpdateBusinessWorkHoursRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1258348646;
    
    public string $_ = 'account.updateBusinessWorkHours';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessWorkHours';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractBusinessWorkHours|null $businessWorkHours
     */
    public function __construct(
        public readonly ?AbstractBusinessWorkHours $businessWorkHours = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->businessWorkHours !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->businessWorkHours->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}