<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineBotSwitchPM;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineBotWebView;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.botResults
 */
final class BotResults extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe021f2f6;
    
    public string $_ = 'messages.botResults';
    
    /**
     * @param int $queryId
     * @param list<AbstractBotInlineResult> $results
     * @param int $cacheTime
     * @param list<AbstractUser> $users
     * @param bool|null $gallery
     * @param string|null $nextOffset
     * @param InlineBotSwitchPM|null $switchPm
     * @param InlineBotWebView|null $switchWebview
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $results,
        public readonly int $cacheTime,
        public readonly array $users,
        public readonly ?bool $gallery = null,
        public readonly ?string $nextOffset = null,
        public readonly ?InlineBotSwitchPM $switchPm = null,
        public readonly ?InlineBotWebView $switchWebview = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gallery) $flags |= (1 << 0);
        if ($this->nextOffset !== null) $flags |= (1 << 1);
        if ($this->switchPm !== null) $flags |= (1 << 2);
        if ($this->switchWebview !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->queryId);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->nextOffset);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->switchPm->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->switchWebview->serialize();
        }
        $buffer .= Serializer::vectorOfObjects($this->results);
        $buffer .= Serializer::int32($this->cacheTime);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $gallery = ($flags & (1 << 0)) ? true : null;
        $queryId = Deserializer::int64($stream);
        $nextOffset = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $switchPm = ($flags & (1 << 2)) ? InlineBotSwitchPM::deserialize($stream) : null;
        $switchWebview = ($flags & (1 << 3)) ? InlineBotWebView::deserialize($stream) : null;
        $results = Deserializer::vectorOfObjects($stream, [AbstractBotInlineResult::class, 'deserialize']);
        $cacheTime = Deserializer::int32($stream);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
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