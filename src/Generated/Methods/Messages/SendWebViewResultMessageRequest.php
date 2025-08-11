<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\WebViewMessageSent;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendWebViewResultMessage
 */
final class SendWebViewResultMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa4314f5;
    
    public string $_ = 'messages.sendWebViewResultMessage';
    
    public function getMethodName(): string
    {
        return 'messages.sendWebViewResultMessage';
    }
    
    public function getResponseClass(): string
    {
        return WebViewMessageSent::class;
    }
    /**
     * @param string $botQueryId
     * @param AbstractInputBotInlineResult $result
     */
    public function __construct(
        public readonly string $botQueryId,
        public readonly AbstractInputBotInlineResult $result
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->botQueryId);
        $buffer .= $this->result->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}