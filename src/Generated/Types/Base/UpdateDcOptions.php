<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDcOptions
 */
final class UpdateDcOptions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8e5e9873;
    
    public string $_ = 'updateDcOptions';
    
    /**
     * @param list<DcOption> $dcOptions
     */
    public function __construct(
        public readonly array $dcOptions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->dcOptions);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $dcOptions = Deserializer::vectorOfObjects($stream, [DcOption::class, 'deserialize']);
        return new self(
            $dcOptions
        );
    }
}