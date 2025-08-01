<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInlineBotSwitchPM;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInlineBotWebView;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setInlineBotResults
 */
final class SetInlineBotResultsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3138561049;
    
    public string $_ = 'messages.setInlineBotResults';
    
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
     * @param bool|null $gallery
     * @param bool|null $private
     * @param string|null $nextOffset
     * @param AbstractInlineBotSwitchPM|null $switchPm
     * @param AbstractInlineBotWebView|null $switchWebview
     */
    public function __construct(
        public readonly int $queryId,
        public readonly array $results,
        public readonly int $cacheTime,
        public readonly ?bool $gallery = null,
        public readonly ?bool $private = null,
        public readonly ?string $nextOffset = null,
        public readonly ?AbstractInlineBotSwitchPM $switchPm = null,
        public readonly ?AbstractInlineBotWebView $switchWebview = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gallery) $flags |= (1 << 0);
        if ($this->private) $flags |= (1 << 1);
        if ($this->nextOffset !== null) $flags |= (1 << 2);
        if ($this->switchPm !== null) $flags |= (1 << 3);
        if ($this->switchWebview !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->vectorOfObjects($this->results);
        $buffer .= $serializer->int32($this->cacheTime);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->nextOffset);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->switchPm->serialize($serializer);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->switchWebview->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}