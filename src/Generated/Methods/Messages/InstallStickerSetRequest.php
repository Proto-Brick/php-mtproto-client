<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickerSetInstallResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.installStickerSet
 */
final class InstallStickerSetRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc78fe460;
    
    public string $predicate = 'messages.installStickerSet';
    
    public function getMethodName(): string
    {
        return 'messages.installStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSetInstallResult::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param bool $archived
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly bool $archived
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= ($this->archived ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}