<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReportResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.report
 */
final class ReportRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 433646405;
    
    public string $_ = 'stories.report';
    
    public function getMethodName(): string
    {
        return 'stories.report';
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->id);
        $buffer .= $serializer->bytes($this->option);
        $buffer .= $serializer->bytes($this->message);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}