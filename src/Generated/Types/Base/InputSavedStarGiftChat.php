<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputSavedStarGiftChat
 */
final class InputSavedStarGiftChat extends AbstractInputSavedStarGift
{
    public const CONSTRUCTOR_ID = 0xf101aa7f;
    
    public string $predicate = 'inputSavedStarGiftChat';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $savedId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $savedId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->savedId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractInputPeer::deserialize($stream);
        $savedId = Deserializer::int64($stream);

        return new self(
            $peer,
            $savedId
        );
    }
}