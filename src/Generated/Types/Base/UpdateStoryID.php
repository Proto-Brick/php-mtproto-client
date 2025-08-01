<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateStoryID
 */
final class UpdateStoryID extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 468923833;
    
    public string $_ = 'updateStoryID';
    
    /**
     * @param int $id
     * @param int $randomId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $randomId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int64($this->randomId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int32($stream);
        $randomId = $deserializer->int64($stream);
            return new self(
            $id,
            $randomId
        );
    }
}