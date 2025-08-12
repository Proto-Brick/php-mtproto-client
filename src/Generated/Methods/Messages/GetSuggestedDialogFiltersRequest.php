<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\DialogFilterSuggested;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSuggestedDialogFilters
 */
final class GetSuggestedDialogFiltersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa29cd42c;
    
    public string $predicate = 'messages.getSuggestedDialogFilters';
    
    public function getMethodName(): string
    {
        return 'messages.getSuggestedDialogFilters';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . DialogFilterSuggested::class . '>';
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