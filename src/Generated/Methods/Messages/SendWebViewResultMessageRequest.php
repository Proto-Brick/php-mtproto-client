<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebViewMessageSent;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendWebViewResultMessage
 */
final class SendWebViewResultMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 172168437;
    
    public string $_ = 'messages.sendWebViewResultMessage';
    
    public function getMethodName(): string
    {
        return 'messages.sendWebViewResultMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWebViewMessageSent::class;
    }
    /**
     * @param string $botQueryId
     * @param AbstractInputBotInlineResult $result
     */
    public function __construct(
        public readonly string $botQueryId,
        public readonly AbstractInputBotInlineResult $result
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->botQueryId);
        $buffer .= $this->result->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}