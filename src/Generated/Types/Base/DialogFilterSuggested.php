<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dialogFilterSuggested
 */
final class DialogFilterSuggested extends AbstractDialogFilterSuggested
{
    public const CONSTRUCTOR_ID = 2004110666;
    
    public string $_ = 'dialogFilterSuggested';
    
    /**
     * @param AbstractDialogFilter $filter
     * @param string $description
     */
    public function __construct(
        public readonly AbstractDialogFilter $filter,
        public readonly string $description
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->filter->serialize($serializer);
        $buffer .= $serializer->bytes($this->description);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $filter = AbstractDialogFilter::deserialize($deserializer, $stream);
        $description = $deserializer->bytes($stream);
            return new self(
            $filter,
            $description
        );
    }
}