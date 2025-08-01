<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogFilter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.updateDialogFilter
 */
final class UpdateDialogFilterRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 450142282;
    
    public string $_ = 'messages.updateDialogFilter';
    
    public function getMethodName(): string
    {
        return 'messages.updateDialogFilter';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $id
     * @param AbstractDialogFilter|null $filter
     */
    public function __construct(
        public readonly int $id,
        public readonly ?AbstractDialogFilter $filter = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->filter !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->filter->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}