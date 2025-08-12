<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\DefaultHistoryTTL;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDefaultHistoryTTL
 */
final class GetDefaultHistoryTTLRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x658b7188;
    
    public string $predicate = 'messages.getDefaultHistoryTTL';
    
    public function getMethodName(): string
    {
        return 'messages.getDefaultHistoryTTL';
    }
    
    public function getResponseClass(): string
    {
        return DefaultHistoryTTL::class;
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