<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDialogPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractPeerDialogs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getPeerDialogs
 */
final class GetPeerDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3832593661;
    
    public string $_ = 'messages.getPeerDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPeerDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPeerDialogs::class;
    }
    /**
     * @param list<AbstractInputDialogPeer> $peers
     */
    public function __construct(
        public readonly array $peers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}