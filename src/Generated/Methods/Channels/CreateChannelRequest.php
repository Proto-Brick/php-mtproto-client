<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.createChannel
 */
final class CreateChannelRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x91006707;
    
    public string $predicate = 'channels.createChannel';
    
    public function getMethodName(): string
    {
        return 'channels.createChannel';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param string $title
     * @param string $about
     * @param true|null $broadcast
     * @param true|null $megagroup
     * @param true|null $forImport
     * @param true|null $forum
     * @param AbstractInputGeoPoint|null $geoPoint
     * @param string|null $address
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly string $title,
        public readonly string $about,
        public readonly ?true $broadcast = null,
        public readonly ?true $megagroup = null,
        public readonly ?true $forImport = null,
        public readonly ?true $forum = null,
        public readonly ?AbstractInputGeoPoint $geoPoint = null,
        public readonly ?string $address = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcast) $flags |= (1 << 0);
        if ($this->megagroup) $flags |= (1 << 1);
        if ($this->forImport) $flags |= (1 << 3);
        if ($this->forum) $flags |= (1 << 5);
        if ($this->geoPoint !== null) $flags |= (1 << 2);
        if ($this->address !== null) $flags |= (1 << 2);
        if ($this->ttlPeriod !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->about);
        if ($flags & (1 << 2)) {
            $buffer .= $this->geoPoint->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->address);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}