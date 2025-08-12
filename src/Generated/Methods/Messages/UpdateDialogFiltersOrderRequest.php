<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.updateDialogFiltersOrder
 */
final class UpdateDialogFiltersOrderRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc563c1e4;
    
    public string $predicate = 'messages.updateDialogFiltersOrder';
    
    public function getMethodName(): string
    {
        return 'messages.updateDialogFiltersOrder';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $order
     */
    public function __construct(
        public readonly array $order
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->order);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}