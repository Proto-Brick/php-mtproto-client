<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botCallbackAnswer
 */
final class BotCallbackAnswer extends TlObject
{
    public const CONSTRUCTOR_ID = 0x36585ea4;
    
    public string $predicate = 'messages.botCallbackAnswer';
    
    /**
     * @param int $cacheTime
     * @param true|null $alert
     * @param true|null $hasUrl
     * @param true|null $nativeUi
     * @param string|null $message
     * @param string|null $url
     */
    public function __construct(
        public readonly int $cacheTime,
        public readonly ?true $alert = null,
        public readonly ?true $hasUrl = null,
        public readonly ?true $nativeUi = null,
        public readonly ?string $message = null,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->alert) $flags |= (1 << 1);
        if ($this->hasUrl) $flags |= (1 << 3);
        if ($this->nativeUi) $flags |= (1 << 4);
        if ($this->message !== null) $flags |= (1 << 0);
        if ($this->url !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->message);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->url);
        }
        $buffer .= Serializer::int32($this->cacheTime);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $alert = ($flags & (1 << 1)) ? true : null;
        $hasUrl = ($flags & (1 << 3)) ? true : null;
        $nativeUi = ($flags & (1 << 4)) ? true : null;
        $message = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $url = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $cacheTime = Deserializer::int32($stream);

        return new self(
            $cacheTime,
            $alert,
            $hasUrl,
            $nativeUi,
            $message,
            $url
        );
    }
}