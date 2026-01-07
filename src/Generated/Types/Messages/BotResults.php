<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotInlineResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineBotSwitchPM;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InlineBotWebView;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.botResults
 */
final class BotResults extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe021f2f6;
    
    public string $predicate = 'messages.botResults';
    
    /**
     * @param int $queryId
     * @param list<AbstractBotInlineResult> $results
     * @param int $cacheTime
     * @param list<AbstractUser> $users
     * @param true|null $gallery
     * @param string|null $nextOffset
     * @param InlineBotSwitchPM|null $switchPm
     * @param InlineBotWebView|null $switchWebview
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $results,
        public readonly int $cacheTime,
        public readonly array $users,
        public readonly ?true $gallery = null,
        public readonly ?string $nextOffset = null,
        public readonly ?InlineBotSwitchPM $switchPm = null,
        public readonly ?InlineBotWebView $switchWebview = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gallery) {
            $flags |= (1 << 0);
        }
        if ($this->nextOffset !== null) {
            $flags |= (1 << 1);
        }
        if ($this->switchPm !== null) {
            $flags |= (1 << 2);
        }
        if ($this->switchWebview !== null) {
            $flags |= (1 << 3);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $gallery = (($flags & (1 << 0)) !== 0) ? true : null;
        $queryId = Deserializer::int64($__payload, $__offset);
        $nextOffset = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $switchPm = (($flags & (1 << 2)) !== 0) ? InlineBotSwitchPM::deserialize($__payload, $__offset) : null;
        $switchWebview = (($flags & (1 << 3)) !== 0) ? InlineBotWebView::deserialize($__payload, $__offset) : null;
        $results = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractBotInlineResult::class, 'deserialize']);
        $cacheTime = Deserializer::int32($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

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