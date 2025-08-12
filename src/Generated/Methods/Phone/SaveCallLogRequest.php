<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.saveCallLog
 */
final class SaveCallLogRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x41248786;
    
    public string $predicate = 'phone.saveCallLog';
    
    public function getMethodName(): string
    {
        return 'phone.saveCallLog';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputPhoneCall $peer
     * @param AbstractInputFile $file
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly AbstractInputFile $file
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->file->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}