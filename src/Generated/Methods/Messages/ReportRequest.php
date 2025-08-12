<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReportResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.report
 */
final class ReportRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfc78af9b;
    
    public string $predicate = 'messages.report';
    
    public function getMethodName(): string
    {
        return 'messages.report';
    }
    
    public function getResponseClass(): string
    {
        return AbstractReportResult::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     * @param string $option
     * @param string $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id,
        public readonly string $option,
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        $buffer .= Serializer::bytes($this->option);
        $buffer .= Serializer::bytes($this->message);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}