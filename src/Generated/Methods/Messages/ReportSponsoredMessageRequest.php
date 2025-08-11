<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AbstractSponsoredMessageReportResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.reportSponsoredMessage
 */
final class ReportSponsoredMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1af3dbb8;
    
    public string $_ = 'messages.reportSponsoredMessage';
    
    public function getMethodName(): string
    {
        return 'messages.reportSponsoredMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSponsoredMessageReportResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $randomId
     * @param string $option
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $randomId,
        public readonly string $option
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->randomId);
        $buffer .= Serializer::bytes($this->option);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}