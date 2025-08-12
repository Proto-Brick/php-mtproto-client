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
    public const CONSTRUCTOR_ID = 0xb0711d83;
    
    public string $predicate = 'bots.getAdminedBots';
    
    public function getMethodName(): string
    {
        return 'bots.getAdminedBots';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractUser::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}