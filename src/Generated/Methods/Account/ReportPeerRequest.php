<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReportReason;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.reportPeer
 */
final class ReportPeerRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3317316998;
    
    public string $_ = 'account.reportPeer';
    
    public function getMethodName(): string
    {
        return 'account.reportPeer';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractReportReason $reason
     * @param string $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractReportReason $reason,
        public readonly string $message
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->reason->serialize($serializer);
        $buffer .= $serializer->bytes($this->message);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}