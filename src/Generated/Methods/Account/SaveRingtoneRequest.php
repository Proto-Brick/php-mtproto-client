<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractSavedRingtone;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveRingtone
 */
final class SaveRingtoneRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3dea5b03;
    
    public string $_ = 'account.saveRingtone';
    
    public function getMethodName(): string
    {
        return 'account.saveRingtone';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedRingtone::class;
    }
    /**
     * @param AbstractInputDocument $id
     * @param bool $unsave
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly bool $unsave
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= ($this->unsave ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}