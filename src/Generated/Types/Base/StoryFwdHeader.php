<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/storyFwdHeader
 */
final class StoryFwdHeader extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb826e150;
    
    public string $predicate = 'storyFwdHeader';
    
    /**
     * @param true|null $modified
     * @param AbstractPeer|null $from
     * @param string|null $fromName
     * @param int|null $storyId
     */
    public function __construct(
        public readonly ?true $modified = null,
        public readonly ?AbstractPeer $from = null,
        public readonly ?string $fromName = null,
        public readonly ?int $storyId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->modified) {
            $flags |= (1 << 3);
        }
        if ($this->from !== null) {
            $flags |= (1 << 0);
        }
        if ($this->fromName !== null) {
            $flags |= (1 << 1);
        }
        if ($this->storyId !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->from->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->fromName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->storyId);
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
        $modified = (($flags & (1 << 3)) !== 0) ? true : null;
        $from = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $fromName = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $storyId = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $modified,
            $from,
            $fromName,
            $storyId
        );
    }
}