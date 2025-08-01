<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getAdminedBots
 */
final class GetAdminedBotsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2960203139;
    
    public string $_ = 'bots.getAdminedBots';
    
    public function getMethodName(): string
    {
        return 'bots.getAdminedBots';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}