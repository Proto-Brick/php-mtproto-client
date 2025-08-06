<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendWebViewData
 */
final class SendWebViewDataRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdc0242c8;
    
    public string $_ = 'messages.sendWebViewData';
    
    public function getMethodName(): string
    {
        return 'messages.sendWebViewData';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param int $randomId
     * @param string $buttonText
     * @param string $data
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly int $randomId,
        public readonly string $buttonText,
        public readonly string $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->bytes($this->buttonText);
        $buffer .= $serializer->bytes($this->data);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}