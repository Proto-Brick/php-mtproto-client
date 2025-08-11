<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\DialogFilters;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDialogFilters
 */
final class GetDialogFiltersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xefd48c89;
    
    public string $_ = 'messages.getDialogFilters';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogFilters';
    }
    
    public function getResponseClass(): string
    {
        return DialogFilters::class;
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