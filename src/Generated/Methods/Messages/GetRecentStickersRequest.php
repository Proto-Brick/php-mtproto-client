<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractRecentStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getRecentStickers
 */
final class GetRecentStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2645114939;
    
    public string $_ = 'messages.getRecentStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getRecentStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractRecentStickers::class;
    }
    /**
     * @param int $hash
     * @param bool|null $attached
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?bool $attached = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->attached) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}