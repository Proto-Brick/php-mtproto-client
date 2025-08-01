<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Users;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/users.getIsPremiumRequiredToContact
 */
final class GetIsPremiumRequiredToContactRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2787289616;
    
    public string $_ = 'users.getIsPremiumRequiredToContact';
    
    public function getMethodName(): string
    {
        return 'users.getIsPremiumRequiredToContact';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<bool>';
    }
    /**
     * @param list<AbstractInputUser> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}