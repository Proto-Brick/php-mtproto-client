<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageBlockAudio
 */
final class PageBlockAudio extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 2151899626;
    
    public string $_ = 'pageBlockAudio';
    
    /**
     * @param int $audioId
     * @param AbstractPageCaption $caption
     */
    public function __construct(
        public readonly int $audioId,
        public readonly AbstractPageCaption $caption
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->audioId);
        $buffer .= $this->caption->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $audioId = $deserializer->int64($stream);
        $caption = AbstractPageCaption::deserialize($deserializer, $stream);
            return new self(
            $audioId,
            $caption
        );
    }
}