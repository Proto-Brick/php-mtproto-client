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
    
    public string $predicate = 'updateGroupCallConnection';
    
    /**
     * @param array $params
     * @param true|null $presentation
     */
    public function __construct(
        public readonly array $params,
        public readonly ?true $presentation = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->presentation) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes(json_encode($this->params, JSON_FORCE_OBJECT));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $presentation = ($flags & (1 << 0)) ? true : null;
        $params = Deserializer::deserializeDataJSON($stream);

        return new self(
            $params,
            $presentation
        );
    }
}