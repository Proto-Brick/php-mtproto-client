<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Updates\AbstractState;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/updates.getState
 */
final class GetStateRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3990128682;
    
    public string $_ = 'updates.getState';
    
    public function getMethodName(): string
    {
        return 'updates.getState';
    }
    
    public function getResponseClass(): string
    {
        return AbstractState::class;
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