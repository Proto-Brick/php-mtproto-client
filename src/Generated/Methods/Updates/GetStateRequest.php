<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Updates\State;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/updates.getState
 */
final class GetStateRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xedd4882a;
    
    public string $predicate = 'updates.getState';
    
    public function getMethodName(): string
    {
        return 'updates.getState';
    }
    
    public function getResponseClass(): string
    {
        return State::class;
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