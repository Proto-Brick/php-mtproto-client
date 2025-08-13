<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputReplyToMonoForum
 */
final class InputReplyToMonoForum extends AbstractInputReplyTo
{
    public const CONSTRUCTOR_ID = 0x69d66c45;
    
    public string $predicate = 'inputReplyToMonoForum';
    
    /**
     * @param AbstractInputPeer $monoforumPeerId
     */
    public function __construct(
        public readonly AbstractInputPeer $monoforumPeerId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->monoforumPeerId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $monoforumPeerId = AbstractInputPeer::deserialize($stream);

        return new self(
            $monoforumPeerId
        );
    }
}