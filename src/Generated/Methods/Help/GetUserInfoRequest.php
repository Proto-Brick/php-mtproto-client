<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractUserInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getUserInfo
 */
final class GetUserInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x38a08d3;
    
    public string $predicate = 'help.getUserInfo';
    
    public function getMethodName(): string
    {
        return 'help.getUserInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUserInfo::class;
    }
    /**
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}