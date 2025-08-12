<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateWebPage
 */
final class UpdateWebPage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7f891213;
    
    public string $predicate = 'updateWebPage';
    
    /**
     * @param AbstractWebPage $webpage
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractWebPage $webpage,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->webpage->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $webpage = AbstractWebPage::deserialize($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);

        return new self(
            $webpage,
            $pts,
            $ptsCount
        );
    }
}