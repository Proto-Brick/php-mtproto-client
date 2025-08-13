<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/autoSaveException
 */
final class AutoSaveException extends TlObject
{
    public const CONSTRUCTOR_ID = 0x81602d47;
    
    public string $predicate = 'autoSaveException';
    
    /**
     * @param AbstractPeer $peer
     * @param AutoSaveSettings $settings
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AutoSaveSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractPeer::deserialize($stream);
        $settings = AutoSaveSettings::deserialize($stream);

        return new self(
            $peer,
            $settings
        );
    }
}