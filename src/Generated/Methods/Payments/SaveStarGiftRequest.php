<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.saveStarGift
 */
final class SaveStarGiftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x87acf08e;
    
    public string $_ = 'payments.saveStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.saveStarGift';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $msgId
     * @param bool|null $unsave
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $msgId,
        public readonly ?bool $unsave = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unsave) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}