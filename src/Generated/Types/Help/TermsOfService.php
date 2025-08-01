<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.termsOfService
 */
final class TermsOfService extends AbstractTermsOfService
{
    public const CONSTRUCTOR_ID = 2013922064;
    
    public string $_ = 'help.termsOfService';
    
    /**
     * @param array $id
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     * @param bool|null $popup
     * @param int|null $minAgeConfirm
     */
    public function __construct(
        public readonly array $id,
        public readonly string $text,
        public readonly array $entities,
        public readonly ?bool $popup = null,
        public readonly ?int $minAgeConfirm = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->popup) $flags |= (1 << 0);
        if ($this->minAgeConfirm !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= (new DataJSON(json_encode($this->id)))->serialize($serializer);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->vectorOfObjects($this->entities);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->minAgeConfirm);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $popup = ($flags & (1 << 0)) ? true : null;
        $id = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
        $text = $deserializer->bytes($stream);
        $entities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $minAgeConfirm = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $id,
            $text,
            $entities,
            $popup,
            $minAgeConfirm
        );
    }
}