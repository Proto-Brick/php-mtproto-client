<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaDocument
 */
final class MessageMediaDocument extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x52d8ccd9;
    
    public string $predicate = 'messageMediaDocument';
    
    /**
     * @param true|null $nopremium
     * @param true|null $spoiler
     * @param true|null $video
     * @param true|null $round
     * @param true|null $voice
     * @param AbstractDocument|null $document
     * @param list<AbstractDocument>|null $altDocuments
     * @param AbstractPhoto|null $videoCover
     * @param int|null $videoTimestamp
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly ?true $nopremium = null,
        public readonly ?true $spoiler = null,
        public readonly ?true $video = null,
        public readonly ?true $round = null,
        public readonly ?true $voice = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?array $altDocuments = null,
        public readonly ?AbstractPhoto $videoCover = null,
        public readonly ?int $videoTimestamp = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nopremium) {
            $flags |= (1 << 3);
        }
        if ($this->spoiler) {
            $flags |= (1 << 4);
        }
        if ($this->video) {
            $flags |= (1 << 6);
        }
        if ($this->round) {
            $flags |= (1 << 7);
        }
        if ($this->voice) {
            $flags |= (1 << 8);
        }
        if ($this->document !== null) {
            $flags |= (1 << 0);
        }
        if ($this->altDocuments !== null) {
            $flags |= (1 << 5);
        }
        if ($this->videoCover !== null) {
            $flags |= (1 << 9);
        }
        if ($this->videoTimestamp !== null) {
            $flags |= (1 << 10);
        }
        if ($this->ttlSeconds !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::vectorOfObjects($this->altDocuments);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $this->videoCover->serialize();
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->videoTimestamp);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $nopremium = (($flags & (1 << 3)) !== 0) ? true : null;
        $spoiler = (($flags & (1 << 4)) !== 0) ? true : null;
        $video = (($flags & (1 << 6)) !== 0) ? true : null;
        $round = (($flags & (1 << 7)) !== 0) ? true : null;
        $voice = (($flags & (1 << 8)) !== 0) ? true : null;
        $document = (($flags & (1 << 0)) !== 0) ? AbstractDocument::deserialize($stream) : null;
        $altDocuments = (($flags & (1 << 5)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']) : null;
        $videoCover = (($flags & (1 << 9)) !== 0) ? AbstractPhoto::deserialize($stream) : null;
        $videoTimestamp = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($stream) : null;
        $ttlSeconds = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $nopremium,
            $spoiler,
            $video,
            $round,
            $voice,
            $document,
            $altDocuments,
            $videoCover,
            $videoTimestamp,
            $ttlSeconds
        );
    }
}