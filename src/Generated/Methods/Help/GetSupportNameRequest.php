<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\SupportName;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getSupportName
 */
final class GetSupportNameRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd360e72c;
    
    public string $predicate = 'help.getSupportName';
    
    public function getMethodName(): string
    {
        return 'help.getSupportName';
    }
    
    public function getResponseClass(): string
    {
        return SupportName::class;
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