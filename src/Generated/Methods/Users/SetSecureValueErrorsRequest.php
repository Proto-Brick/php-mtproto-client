<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Users;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValueError;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/users.setSecureValueErrors
 */
final class SetSecureValueErrorsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x90c894b5;
    
    public string $_ = 'users.setSecureValueErrors';
    
    public function getMethodName(): string
    {
        return 'users.setSecureValueErrors';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $id
     * @param list<AbstractSecureValueError> $errors
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly array $errors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= Serializer::vectorOfObjects($this->errors);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}