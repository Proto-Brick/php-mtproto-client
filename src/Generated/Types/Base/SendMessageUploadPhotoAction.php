<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendMessageUploadPhotoAction
 */
final class SendMessageUploadPhotoAction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xd1d34a26;
    
    public string $_ = 'sendMessageUploadPhotoAction';
    
    /**
     * @param int $progress
     */
    public function __construct(
        public readonly int $progress
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->progress);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $progress = $deserializer->int32($stream);
        return new self(
            $progress
        );
    }
}