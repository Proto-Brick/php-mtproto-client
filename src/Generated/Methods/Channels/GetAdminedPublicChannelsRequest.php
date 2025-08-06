<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getAdminedPublicChannels
 */
final class GetAdminedPublicChannelsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf8b036af;
    
    public string $_ = 'channels.getAdminedPublicChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getAdminedPublicChannels';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param bool|null $byLocation
     * @param bool|null $checkLimit
     * @param bool|null $forPersonal
     */
    public function __construct(
        public readonly ?bool $byLocation = null,
        public readonly ?bool $checkLimit = null,
        public readonly ?bool $forPersonal = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->byLocation) $flags |= (1 << 0);
        if ($this->checkLimit) $flags |= (1 << 1);
        if ($this->forPersonal) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}