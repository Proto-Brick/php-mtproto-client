<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\GroupCallStreamChannel;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/phone.groupCallStreamChannels
 */
final class GroupCallStreamChannels extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd0e482b2;
    
    public string $predicate = 'phone.groupCallStreamChannels';
    
    /**
     * @param list<GroupCallStreamChannel> $channels
     */
    public function __construct(
        public readonly array $channels
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->channels);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $channels = Deserializer::vectorOfObjects($stream, [GroupCallStreamChannel::class, 'deserialize']);

        return new self(
            $channels
        );
    }
}