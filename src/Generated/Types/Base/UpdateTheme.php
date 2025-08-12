<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateTheme
 */
final class UpdateTheme extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8216fba3;
    
    public string $predicate = 'updateTheme';
    
    /**
     * @param Theme $theme
     */
    public function __construct(
        public readonly Theme $theme
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->theme->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $theme = Theme::deserialize($stream);

        return new self(
            $theme
        );
    }
}