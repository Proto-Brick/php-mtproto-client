<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.stickers
 */
final class Stickers extends AbstractStickers
{
    public const CONSTRUCTOR_ID = 0x30a6ec7e;
    
    public string $_ = 'messages.stickers';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $stickers
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $stickers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->stickers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $stickers = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        return new self(
            $hash,
            $stickers
        );
    }
}