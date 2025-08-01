<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Bots\AbstractBotInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getBotInfo
 */
final class GetBotInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3705214205;
    
    public string $_ = 'bots.getBotInfo';
    
    public function getMethodName(): string
    {
        return 'bots.getBotInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotInfo::class;
    }
    /**
     * @param string $langCode
     * @param AbstractInputUser|null $bot
     */
    public function __construct(
        public readonly string $langCode,
        public readonly ?AbstractInputUser $bot = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bot !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->bot->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->langCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}