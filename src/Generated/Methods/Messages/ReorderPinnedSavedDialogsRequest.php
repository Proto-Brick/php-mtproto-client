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
    public const CONSTRUCTOR_ID = 2339464583;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->order);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}