<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setBotInfo
 */
final class SetBotInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x10cf3123;
    
    public string $_ = 'bots.setBotInfo';
    
    public function getMethodName(): string
    {
        return 'bots.setBotInfo';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $langCode
     * @param AbstractInputUser|null $bot
     * @param string|null $name
     * @param string|null $about
     * @param string|null $description
     */
    public function __construct(
        public readonly string $langCode,
        public readonly ?AbstractInputUser $bot = null,
        public readonly ?string $name = null,
        public readonly ?string $about = null,
        public readonly ?string $description = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bot !== null) $flags |= (1 << 2);
        if ($this->name !== null) $flags |= (1 << 3);
        if ($this->about !== null) $flags |= (1 << 0);
        if ($this->description !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 2)) {
            $buffer .= $this->bot->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->langCode);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->name);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->about);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->description);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}