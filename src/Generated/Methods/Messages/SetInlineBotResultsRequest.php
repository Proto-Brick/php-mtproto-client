<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineBotSwitchPM;
use DigitalStars\MtprotoClient\Generated\Types\Base\InlineBotWebView;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setInlineBotResults
 */
final class SetInlineBotResultsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbb12a419;
    
    public string $predicate = 'messages.setInlineBotResults';
    
    public function getMethodName(): string
    {
        return 'messages.setInlineBotResults';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param list<AbstractInputBotInlineResult> $results
     * @param int $cacheTime
     * @param true|null $gallery
     * @param true|null $private
     * @param string|null $nextOffset
     * @param InlineBotSwitchPM|null $switchPm
     * @param InlineBotWebView|null $switchWebview
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $results,
        public readonly int $cacheTime,
        public readonly ?true $gallery = null,
        public readonly ?true $private = null,
        public readonly ?string $nextOffset = null,
        public readonly ?InlineBotSwitchPM $switchPm = null,
        public readonly ?InlineBotWebView $switchWebview = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gallery) $flags |= (1 << 0);
        if ($this->private) $flags |= (1 << 1);
        if ($this->nextOffset !== null) $flags |= (1 << 2);
        if ($this->switchPm !== null) $flags |= (1 << 3);
        if ($this->switchWebview !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::vectorOfObjects($this->results);
        $buffer .= Serializer::int32($this->cacheTime);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->nextOffset);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->switchPm->serialize();
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->switchWebview->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}