<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Bots\BotInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getBotInfo
 */
final class GetBotInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdcd914fd;
    
    public string $predicate = 'bots.getBotInfo';
    
    public function getMethodName(): string
    {
        return 'bots.getBotInfo';
    }
    
    public function getResponseClass(): string
    {
        return BotInfo::class;
    }
    /**
     * @param string $langCode
     * @param AbstractInputUser|null $bot
     */
    public function __construct(
        public readonly string $langCode,
        public readonly ?AbstractInputUser $bot = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bot !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->bot->serialize();
        }
        $buffer .= Serializer::bytes($this->langCode);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}