<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPagePending
 */
final class WebPagePending extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0xb0d13e47;
    
    public string $_ = 'webPagePending';
    
    /**
     * @param int $id
     * @param int $date
     * @param string|null $url
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->url !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->url);
        }
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $id = Deserializer::int64($stream);
        $url = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $date = Deserializer::int32($stream);
        return new self(
            $id,
            $date,
            $url
        );
    }
}