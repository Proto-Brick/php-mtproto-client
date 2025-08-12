<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessIntro;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateBusinessIntro
 */
final class UpdateBusinessIntroRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa614d034;
    
    public string $predicate = 'account.updateBusinessIntro';
    
    public function getMethodName(): string
    {
        return 'account.updateBusinessIntro';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputBusinessIntro|null $intro
     */
    public function __construct(
        public readonly ?InputBusinessIntro $intro = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->intro !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->intro->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}