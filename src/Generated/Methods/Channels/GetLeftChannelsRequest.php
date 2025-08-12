<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getLeftChannels
 */
final class GetLeftChannelsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8341ecc0;
    
    public string $predicate = 'channels.getLeftChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getLeftChannels';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param int $offset
     */
    public function __construct(
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}