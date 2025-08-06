<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateGroupCallConnection
 */
final class UpdateGroupCallConnection extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb783982;
    
    public string $_ = 'updateGroupCallConnection';
    
    /**
     * @param array $params
     * @param bool|null $presentation
     */
    public function __construct(
        public readonly array $params,
        public readonly ?bool $presentation = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->presentation) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes(json_encode($this->params, JSON_FORCE_OBJECT));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $presentation = ($flags & (1 << 0)) ? true : null;
        $params = $deserializer->deserializeDataJSON($stream);
        return new self(
            $params,
            $presentation
        );
    }
}