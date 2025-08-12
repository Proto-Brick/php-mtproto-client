<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\Support;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getSupport
 */
final class GetSupportRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9cdf08cd;
    
    public string $predicate = 'help.getSupport';
    
    public function getMethodName(): string
    {
        return 'help.getSupport';
    }
    
    public function getResponseClass(): string
    {
        return Support::class;
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