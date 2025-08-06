<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/exportedChatlistInvite
 */
final class ExportedChatlistInvite extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc5181ac;
    
    public string $_ = 'exportedChatlistInvite';
    
    /**
     * @param string $title
     * @param string $url
     * @param list<AbstractPeer> $peers
     */
    public function __construct(
        public readonly string $title,
        public readonly string $url,
        public readonly array $peers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $title = $deserializer->bytes($stream);
        $url = $deserializer->bytes($stream);
        $peers = $deserializer->vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);
        return new self(
            $title,
            $url,
            $peers
        );
    }
}