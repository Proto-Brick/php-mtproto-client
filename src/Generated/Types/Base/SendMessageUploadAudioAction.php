<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendMessageUploadAudioAction
 */
final class SendMessageUploadAudioAction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xf351d7ab;
    
    public string $predicate = 'sendMessageUploadAudioAction';
    
    /**
     * @param int $progress
     */
    public function __construct(
        public readonly int $progress
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->progress);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $progress = Deserializer::int32($stream);

        return new self(
            $progress
        );
    }
}