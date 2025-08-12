<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePeerLocated
 */
final class UpdatePeerLocated extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb4afcfb0;
    
    public string $predicate = 'updatePeerLocated';
    
    /**
     * @param list<AbstractPeerLocated> $peers
     */
    public function __construct(
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->peers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peers = Deserializer::vectorOfObjects($stream, [AbstractPeerLocated::class, 'deserialize']);

        return new self(
            $peers
        );
    }
}