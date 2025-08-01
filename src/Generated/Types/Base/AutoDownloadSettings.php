<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/autoDownloadSettings
 */
final class AutoDownloadSettings extends AbstractAutoDownloadSettings
{
    public const CONSTRUCTOR_ID = 3131405864;
    
    public string $_ = 'autoDownloadSettings';
    
    /**
     * @param int $photoSizeMax
     * @param int $videoSizeMax
     * @param int $fileSizeMax
     * @param int $videoUploadMaxbitrate
     * @param int $smallQueueActiveOperationsMax
     * @param int $largeQueueActiveOperationsMax
     * @param bool|null $disabled
     * @param bool|null $videoPreloadLarge
     * @param bool|null $audioPreloadNext
     * @param bool|null $phonecallsLessData
     * @param bool|null $storiesPreload
     */
    public function __construct(
        public readonly int $photoSizeMax,
        public readonly int $videoSizeMax,
        public readonly int $fileSizeMax,
        public readonly int $videoUploadMaxbitrate,
        public readonly int $smallQueueActiveOperationsMax,
        public readonly int $largeQueueActiveOperationsMax,
        public readonly ?bool $disabled = null,
        public readonly ?bool $videoPreloadLarge = null,
        public readonly ?bool $audioPreloadNext = null,
        public readonly ?bool $phonecallsLessData = null,
        public readonly ?bool $storiesPreload = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->disabled) $flags |= (1 << 0);
        if ($this->videoPreloadLarge) $flags |= (1 << 1);
        if ($this->audioPreloadNext) $flags |= (1 << 2);
        if ($this->phonecallsLessData) $flags |= (1 << 3);
        if ($this->storiesPreload) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->photoSizeMax);
        $buffer .= $serializer->int64($this->videoSizeMax);
        $buffer .= $serializer->int64($this->fileSizeMax);
        $buffer .= $serializer->int32($this->videoUploadMaxbitrate);
        $buffer .= $serializer->int32($this->smallQueueActiveOperationsMax);
        $buffer .= $serializer->int32($this->largeQueueActiveOperationsMax);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $disabled = ($flags & (1 << 0)) ? true : null;
        $videoPreloadLarge = ($flags & (1 << 1)) ? true : null;
        $audioPreloadNext = ($flags & (1 << 2)) ? true : null;
        $phonecallsLessData = ($flags & (1 << 3)) ? true : null;
        $storiesPreload = ($flags & (1 << 4)) ? true : null;
        $photoSizeMax = $deserializer->int32($stream);
        $videoSizeMax = $deserializer->int64($stream);
        $fileSizeMax = $deserializer->int64($stream);
        $videoUploadMaxbitrate = $deserializer->int32($stream);
        $smallQueueActiveOperationsMax = $deserializer->int32($stream);
        $largeQueueActiveOperationsMax = $deserializer->int32($stream);
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