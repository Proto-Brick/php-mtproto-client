<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.toggleGroupCallRecord
 */
final class ToggleGroupCallRecordRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf128c708;
    
    public string $_ = 'phone.toggleGroupCallRecord';
    
    public function getMethodName(): string
    {
        return 'phone.toggleGroupCallRecord';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputGroupCall $call
     * @param bool|null $start
     * @param bool|null $video
     * @param string|null $title
     * @param bool|null $videoPortrait
     */
    public function __construct(
        public readonly InputGroupCall $call,
        public readonly ?bool $start = null,
        public readonly ?bool $video = null,
        public readonly ?string $title = null,
        public readonly ?bool $videoPortrait = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->start) $flags |= (1 << 0);
        if ($this->video) $flags |= (1 << 2);
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->videoPortrait !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->call->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->videoPortrait ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}