<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedStoryLink;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.exportStoryLink
 */
final class ExportStoryLinkRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7b8def20;
    
    public string $predicate = 'stories.exportStoryLink';
    
    public function getMethodName(): string
    {
        return 'stories.exportStoryLink';
    }
    
    public function getResponseClass(): string
    {
        return ExportedStoryLink::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}