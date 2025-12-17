<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/folder
 */
final class Folder extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff544e65;
    
    public string $predicate = 'folder';
    
    /**
     * @param int $id
     * @param string $title
     * @param true|null $autofillNewBroadcasts
     * @param true|null $autofillPublicGroups
     * @param true|null $autofillNewCorrespondents
     * @param AbstractChatPhoto|null $photo
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly ?true $autofillNewBroadcasts = null,
        public readonly ?true $autofillPublicGroups = null,
        public readonly ?true $autofillNewCorrespondents = null,
        public readonly ?AbstractChatPhoto $photo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autofillNewBroadcasts) {
            $flags |= (1 << 0);
        }
        if ($this->autofillPublicGroups) {
            $flags |= (1 << 1);
        }
        if ($this->autofillNewCorrespondents) {
            $flags |= (1 << 2);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 3)) {
            $buffer .= $this->photo->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $autofillNewBroadcasts = (($flags & (1 << 0)) !== 0) ? true : null;
        $autofillPublicGroups = (($flags & (1 << 1)) !== 0) ? true : null;
        $autofillNewCorrespondents = (($flags & (1 << 2)) !== 0) ? true : null;
        $id = Deserializer::int32($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $photo = (($flags & (1 << 3)) !== 0) ? AbstractChatPhoto::deserialize($__payload, $__offset) : null;

        return new self(
            $id,
            $title,
            $autofillNewBroadcasts,
            $autofillPublicGroups,
            $autofillNewCorrespondents,
            $photo
        );
    }
}