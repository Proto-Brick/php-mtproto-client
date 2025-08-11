<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReportReason;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.reportProfilePhoto
 */
final class ReportProfilePhotoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfa8cc6f5;
    
    public string $_ = 'account.reportProfilePhoto';
    
    public function getMethodName(): string
    {
        return 'account.reportProfilePhoto';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputPhoto $photoId
     * @param AbstractReportReason $reason
     * @param string $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputPhoto $photoId,
        public readonly AbstractReportReason $reason,
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->photoId->serialize();
        $buffer .= $this->reason->serialize();
        $buffer .= Serializer::bytes($this->message);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}