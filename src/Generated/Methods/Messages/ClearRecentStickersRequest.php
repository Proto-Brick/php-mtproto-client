<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.clearRecentStickers
 */
final class ClearRecentStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8999602d;
    
    public string $_ = 'messages.clearRecentStickers';
    
    public function getMethodName(): string
    {
        return 'messages.clearRecentStickers';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool|null $attached
     */
    public function __construct(
        public readonly ?bool $attached = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->attached) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}