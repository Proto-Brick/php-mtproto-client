<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePhoneCallSignalingData
 */
final class UpdatePhoneCallSignalingData extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2661bf09;
    
    public string $predicate = 'updatePhoneCallSignalingData';
    
    /**
     * @param int $phoneCallId
     * @param string $data
     */
    public function __construct(
        public readonly int $phoneCallId,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->phoneCallId);
        $buffer .= Serializer::bytes($this->data);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $phoneCallId = Deserializer::int64($stream);
        $data = Deserializer::bytes($stream);

        return new self(
            $phoneCallId,
            $data
        );
    }
}