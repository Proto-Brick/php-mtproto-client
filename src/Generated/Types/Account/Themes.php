<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\Theme;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.themes
 */
final class Themes extends AbstractThemes
{
    public const CONSTRUCTOR_ID = 0x9a3d8c6d;
    
    public string $_ = 'account.themes';
    
    /**
     * @param int $hash
     * @param list<Theme> $themes
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $themes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->themes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $themes = $deserializer->vectorOfObjects($stream, [Theme::class, 'deserialize']);
        return new self(
            $hash,
            $themes
        );
    }
}