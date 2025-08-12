<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dialogFilterSuggested
 */
final class DialogFilterSuggested extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77744d4a;
    
    public string $predicate = 'dialogFilterSuggested';
    
    /**
     * @param AbstractDialogFilter $filter
     * @param string $description
     */
    public function __construct(
        public readonly AbstractDialogFilter $filter,
        public readonly string $description
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::bytes($this->description);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $filter = AbstractDialogFilter::deserialize($stream);
        $description = Deserializer::bytes($stream);

        return new self(
            $filter,
            $description
        );
    }
}