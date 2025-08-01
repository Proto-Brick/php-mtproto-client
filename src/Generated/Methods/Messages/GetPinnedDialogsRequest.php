<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractPeerDialogs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getPinnedDialogs
 */
final class GetPinnedDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3602468338;
    
    public string $_ = 'messages.getPinnedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPinnedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPeerDialogs::class;
    }
    /**
     * @param int $folderId
     */
    public function __construct(
        public readonly int $folderId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->folderId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}