<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendMessageUploadDocumentAction
 */
final class SendMessageUploadDocumentAction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xaa0cd9e4;
    
    public string $_ = 'sendMessageUploadDocumentAction';
    
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