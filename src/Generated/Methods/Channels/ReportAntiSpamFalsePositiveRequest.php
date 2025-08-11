<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.reportAntiSpamFalsePositive
 */
final class ReportAntiSpamFalsePositiveRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa850a693;
    
    public string $_ = 'channels.reportAntiSpamFalsePositive';
    
    public function getMethodName(): string
    {
        return 'channels.reportAntiSpamFalsePositive';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}