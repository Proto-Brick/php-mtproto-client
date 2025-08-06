<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\TextWithEntities;
use DigitalStars\MtprotoClient\Generated\Types\Messages\TranslatedText;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.translateText
 */
final class TranslateTextRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x63183030;
    
    public string $_ = 'messages.translateText';
    
    public function getMethodName(): string
    {
        return 'messages.translateText';
    }
    
    public function getResponseClass(): string
    {
        return TranslatedText::class;
    }
    /**
     * @param string $toLang
     * @param AbstractInputPeer|null $peer
     * @param list<int>|null $id
     * @param list<TextWithEntities>|null $text
     */
    public function __construct(
        public readonly string $toLang,
        public readonly ?AbstractInputPeer $peer = null,
        public readonly ?array $id = null,
        public readonly ?array $text = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) $flags |= (1 << 0);
        if ($this->id !== null) $flags |= (1 << 0);
        if ($this->text !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize($serializer);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfInts($this->id);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->text);
        }
        $buffer .= $serializer->bytes($this->toLang);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}