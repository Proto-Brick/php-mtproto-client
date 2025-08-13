<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/autoDownloadSettings
 */
final class AutoDownloadSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbaa57628;
    
    public string $predicate = 'autoDownloadSettings';
    
    /**
     * @param int $photoSizeMax
     * @param int $videoSizeMax
     * @param int $fileSizeMax
     * @param int $videoUploadMaxbitrate
     * @param int $smallQueueActiveOperationsMax
     * @param int $largeQueueActiveOperationsMax
     * @param true|null $disabled
     * @param true|null $videoPreloadLarge
     * @param true|null $audioPreloadNext
     * @param true|null $phonecallsLessData
     * @param true|null $storiesPreload
     */
    public function __construct(
        public readonly int $photoSizeMax,
        public readonly int $videoSizeMax,
        public readonly int $fileSizeMax,
        public readonly int $videoUploadMaxbitrate,
        public readonly int $smallQueueActiveOperationsMax,
        public readonly int $largeQueueActiveOperationsMax,
        public readonly ?true $disabled = null,
        public readonly ?true $videoPreloadLarge = null,
        public readonly ?true $audioPreloadNext = null,
        public readonly ?true $phonecallsLessData = null,
        public readonly ?true $storiesPreload = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->disabled) {
            $flags |= (1 << 0);
        }
        if ($this->videoPreloadLarge) {
            $flags |= (1 << 1);
        }
        if ($this->audioPreloadNext) {
            $flags |= (1 << 2);
        }
        if ($this->phonecallsLessData) {
            $flags |= (1 << 3);
        }
        if ($this->storiesPreload) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->photoSizeMax);
        $buffer .= Serializer::int64($this->videoSizeMax);
        $buffer .= Serializer::int64($this->fileSizeMax);
        $buffer .= Serializer::int32($this->videoUploadMaxbitrate);
        $buffer .= Serializer::int32($this->smallQueueActiveOperationsMax);
        $buffer .= Serializer::int32($this->largeQueueActiveOperationsMax);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $disabled = (($flags & (1 << 0)) !== 0) ? true : null;
        $videoPreloadLarge = (($flags & (1 << 1)) !== 0) ? true : null;
        $audioPreloadNext = (($flags & (1 << 2)) !== 0) ? true : null;
        $phonecallsLessData = (($flags & (1 << 3)) !== 0) ? true : null;
        $storiesPreload = (($flags & (1 << 4)) !== 0) ? true : null;
        $photoSizeMax = Deserializer::int32($stream);
        $videoSizeMax = Deserializer::int64($stream);
        $fileSizeMax = Deserializer::int64($stream);
        $videoUploadMaxbitrate = Deserializer::int32($stream);
        $smallQueueActiveOperationsMax = Deserializer::int32($stream);
        $largeQueueActiveOperationsMax = Deserializer::int32($stream);

        return new self(
            $photoSizeMax,
            $videoSizeMax,
            $fileSizeMax,
            $videoUploadMaxbitrate,
            $smallQueueActiveOperationsMax,
            $largeQueueActiveOperationsMax,
            $disabled,
            $videoPreloadLarge,
            $audioPreloadNext,
            $phonecallsLessData,
            $storiesPreload
        );
    }
}