<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputKeyboardButtonUserProfile
 */
final class InputKeyboardButtonUserProfile extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xe988037b;
    
    public string $predicate = 'inputKeyboardButtonUserProfile';
    
    /**
     * @param string $text
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly string $text,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $text = Deserializer::bytes($stream);
        $userId = AbstractInputUser::deserialize($stream);

        return new self(
            $text,
            $userId
        );
    }
}