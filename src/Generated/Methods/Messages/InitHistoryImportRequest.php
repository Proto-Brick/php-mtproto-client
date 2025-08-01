<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractHistoryImport;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.initHistoryImport
 */
final class InitHistoryImportRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 873008187;
    
    public string $_ = 'messages.initHistoryImport';
    
    public function getMethodName(): string
    {
        return 'messages.initHistoryImport';
    }
    
    public function getResponseClass(): string
    {
        return AbstractHistoryImport::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputFile $file
     * @param int $mediaCount
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputFile $file,
        public readonly int $mediaCount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->file->serialize($serializer);
        $buffer .= $serializer->int32($this->mediaCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}