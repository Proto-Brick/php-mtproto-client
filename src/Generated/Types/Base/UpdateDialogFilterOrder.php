<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDialogFilterOrder
 */
final class UpdateDialogFilterOrder extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa5d72105;
    
    public string $_ = 'updateDialogFilterOrder';
    
    /**
     * @param list<int> $order
     */
    public function __construct(
        public readonly array $order
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfInts($this->order);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $order = $deserializer->vectorOfInts($stream);
        return new self(
            $order
        );
    }
}