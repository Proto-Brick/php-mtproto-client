<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaDocument
 */
final class MessageMediaDocument extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xdd570bd5;
    
    public string $_ = 'messageMediaDocument';
    
    /**
     * @param bool|null $nopremium
     * @param bool|null $spoiler
     * @param bool|null $video
     * @param bool|null $round
     * @param bool|null $voice
     * @param AbstractDocument|null $document
     * @param list<AbstractDocument>|null $altDocuments
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly ?bool $nopremium = null,
        public readonly ?bool $spoiler = null,
        public readonly ?bool $video = null,
        public readonly ?bool $round = null,
        public readonly ?bool $voice = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?array $altDocuments = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nopremium) $flags |= (1 << 3);
        if ($this->spoiler) $flags |= (1 << 4);
        if ($this->video) $flags |= (1 << 6);
        if ($this->round) $flags |= (1 << 7);
        if ($this->voice) $flags |= (1 << 8);
        if ($this->document !== null) $flags |= (1 << 0);
        if ($this->altDocuments !== null) $flags |= (1 << 5);
        if ($this->ttlSeconds !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::vectorOfObjects($this->altDocuments);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $nopremium = ($flags & (1 << 3)) ? true : null;
        $spoiler = ($flags & (1 << 4)) ? true : null;
        $video = ($flags & (1 << 6)) ? true : null;
        $round = ($flags & (1 << 7)) ? true : null;
        $voice = ($flags & (1 << 8)) ? true : null;
        $document = ($flags & (1 << 0)) ? AbstractDocument::deserialize($stream) : null;
        $altDocuments = ($flags & (1 << 5)) ? Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']) : null;
        $ttlSeconds = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        return new self(
            $nopremium,
            $spoiler,
            $video,
            $round,
            $voice,
            $document,
            $altDocuments,
            $ttlSeconds
        );
    }
}