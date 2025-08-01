<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInlineBotSwitchPM;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInlineBotWebView;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botResults
 */
final class BotResults extends AbstractBotResults
{
    public const CONSTRUCTOR_ID = 3760321270;
    
    public string $_ = 'messages.botResults';
    
    /**
     * @param int $queryId
     * @param list<AbstractBotInlineResult> $results
     * @param int $cacheTime
     * @param list<AbstractUser> $users
     * @param bool|null $gallery
     * @param string|null $nextOffset
     * @param AbstractInlineBotSwitchPM|null $switchPm
     * @param AbstractInlineBotWebView|null $switchWebview
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $results,
        public readonly int $cacheTime,
        public readonly array $users,
        public readonly ?bool $gallery = null,
        public readonly ?string $nextOffset = null,
        public readonly ?AbstractInlineBotSwitchPM $switchPm = null,
        public readonly ?AbstractInlineBotWebView $switchWebview = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gallery) $flags |= (1 << 0);
        if ($this->nextOffset !== null) $flags |= (1 << 1);
        if ($this->switchPm !== null) $flags |= (1 << 2);
        if ($this->switchWebview !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->nextOffset);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->switchPm->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->switchWebview->serialize($serializer);
        }
        $buffer .= $serializer->vectorOfObjects($this->results);
        $buffer .= $serializer->int32($this->cacheTime);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $gallery = ($flags & (1 << 0)) ? true : null;
        $queryId = $deserializer->int64($stream);
        $nextOffset = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $switchPm = ($flags & (1 << 2)) ? AbstractInlineBotSwitchPM::deserialize($deserializer, $stream) : null;
        $switchWebview = ($flags & (1 << 3)) ? AbstractInlineBotWebView::deserialize($deserializer, $stream) : null;
        $results = $deserializer->vectorOfObjects($stream, [AbstractBotInlineResult::class, 'deserialize']);
        $cacheTime = $deserializer->int32($stream);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $queryId,
            $results,
            $cacheTime,
            $users,
            $gallery,
            $nextOffset,
            $switchPm,
            $switchWebview
        );
    }
}