<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/requirementToContactPaidMessages
 */
final class RequirementToContactPaidMessages extends AbstractRequirementToContact
{
    public const CONSTRUCTOR_ID = 0xb4f67e93;
    
    public string $predicate = 'requirementToContactPaidMessages';
    
    /**
     * @param int $starsAmount
     */
    public function __construct(
        public readonly int $starsAmount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->starsAmount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $starsAmount = Deserializer::int64($stream);

        return new self(
            $starsAmount
        );
    }
}