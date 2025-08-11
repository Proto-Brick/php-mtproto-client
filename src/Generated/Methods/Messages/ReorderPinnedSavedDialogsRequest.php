<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDialogPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.reorderPinnedSavedDialogs
 */
final class ReorderPinnedSavedDialogsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8b716587;
    
    public string $_ = 'messages.reorderPinnedSavedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.reorderPinnedSavedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<AbstractInputDialogPeer> $order
     * @param bool|null $force
     */
    public function __construct(
        public readonly array $order,
        public readonly ?bool $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::vectorOfObjects($this->order);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}