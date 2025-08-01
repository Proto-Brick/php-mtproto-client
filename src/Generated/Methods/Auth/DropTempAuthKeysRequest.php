<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.dropTempAuthKeys
 */
final class DropTempAuthKeysRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2387124616;
    
    public string $_ = 'auth.dropTempAuthKeys';
    
    public function getMethodName(): string
    {
        return 'auth.dropTempAuthKeys';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $exceptAuthKeys
     */
    public function __construct(
        public readonly array $exceptAuthKeys
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfLongs($this->exceptAuthKeys);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}