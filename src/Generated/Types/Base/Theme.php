<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/theme
 */
final class Theme extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa00e67d6;
    
    public string $predicate = 'theme';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $slug
     * @param string $title
     * @param true|null $creator
     * @param true|null $default_
     * @param true|null $forChat
     * @param AbstractDocument|null $document
     * @param list<ThemeSettings>|null $settings
     * @param string|null $emoticon
     * @param int|null $installsCount
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $slug,
        public readonly string $title,
        public readonly ?true $creator = null,
        public readonly ?true $default_ = null,
        public readonly ?true $forChat = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?array $settings = null,
        public readonly ?string $emoticon = null,
        public readonly ?int $installsCount = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) {
            $flags |= (1 << 0);
        }
        if ($this->default_) {
            $flags |= (1 << 1);
        }
        if ($this->forChat) {
            $flags |= (1 << 5);
        }
        if ($this->document !== null) {
            $flags |= (1 << 2);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 3);
        }
        if ($this->emoticon !== null) {
            $flags |= (1 << 6);
        }
        if ($this->installsCount !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 2)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->settings);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::bytes($this->emoticon);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->installsCount);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $creator = (($flags & (1 << 0)) !== 0) ? true : null;
        $default_ = (($flags & (1 << 1)) !== 0) ? true : null;
        $forChat = (($flags & (1 << 5)) !== 0) ? true : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $slug = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);
        $document = (($flags & (1 << 2)) !== 0) ? AbstractDocument::deserialize($stream) : null;
        $settings = (($flags & (1 << 3)) !== 0) ? Deserializer::vectorOfObjects($stream, [ThemeSettings::class, 'deserialize']) : null;
        $emoticon = (($flags & (1 << 6)) !== 0) ? Deserializer::bytes($stream) : null;
        $installsCount = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $id,
            $accessHash,
            $slug,
            $title,
            $creator,
            $default_,
            $forChat,
            $document,
            $settings,
            $emoticon,
            $installsCount
        );
    }
}