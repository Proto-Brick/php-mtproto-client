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
final class TermsOfService extends TlObject
{
    public const CONSTRUCTOR_ID = 0x780a0310;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->popup) $flags |= (1 << 0);
        if ($this->minAgeConfirm !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes(json_encode($this->id, JSON_FORCE_OBJECT));
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::vectorOfObjects($this->entities);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->minAgeConfirm);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $popup = ($flags & (1 << 0)) ? true : null;
        $id = Deserializer::deserializeDataJSON($stream);
        $text = Deserializer::bytes($stream);
        $entities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $minAgeConfirm = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        return new self(
            $id,
            $text,
            $entities,
            $popup,
            $minAgeConfirm
        );
    }
}