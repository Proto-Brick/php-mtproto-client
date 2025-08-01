<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPrivacyValueAllowUsers
 */
final class InputPrivacyValueAllowUsers extends AbstractInputPrivacyRule
{
    public const CONSTRUCTOR_ID = 320652927;
    
    public string $_ = 'inputPrivacyValueAllowUsers';
    
    /**
     * @param list<AbstractInputUser> $users
     */
    public function __construct(
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $users = $deserializer->vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']);
            return new self(
            $users
        );
    }
}