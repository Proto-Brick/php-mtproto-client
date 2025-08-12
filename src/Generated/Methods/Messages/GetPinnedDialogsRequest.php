<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\PeerDialogs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getPinnedDialogs
 */
final class GetPinnedDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd6b94df2;
    
    public string $predicate = 'messages.getPinnedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPinnedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return PeerDialogs::class;
    }
    /**
     * @param int $folderId
     */
    public function __construct(
        public readonly int $folderId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->folderId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}