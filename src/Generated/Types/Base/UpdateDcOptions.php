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
    public const CONSTRUCTOR_ID = 2388564083;
    
    public string $_ = 'updateDcOptions';
    
    /**
     * @param list<AbstractDcOption> $dcOptions
     */
    public function __construct(
        public readonly array $dcOptions
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->dcOptions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $dcOptions = $deserializer->vectorOfObjects($stream, [AbstractDcOption::class, 'deserialize']);
            return new self(
            $dcOptions
        );
    }
}