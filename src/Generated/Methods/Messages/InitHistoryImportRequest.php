<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\HistoryImport;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.initHistoryImport
 */
final class InitHistoryImportRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x34090c3b;
    
    public string $_ = 'messages.initHistoryImport';
    
    public function getMethodName(): string
    {
        return 'messages.initHistoryImport';
    }
    
    public function getResponseClass(): string
    {
        return HistoryImport::class;
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->file->serialize();
        $buffer .= Serializer::int32($this->mediaCount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}