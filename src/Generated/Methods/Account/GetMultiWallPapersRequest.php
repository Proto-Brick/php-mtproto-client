<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaper;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getMultiWallPapers
 */
final class GetMultiWallPapersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x65ad71dc;
    
    public string $predicate = 'account.getMultiWallPapers';
    
    public function getMethodName(): string
    {
        return 'account.getMultiWallPapers';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractWallPaper::class . '>';
    }
    /**
     * @param list<AbstractInputWallPaper> $wallpapers
     */
    public function __construct(
        public readonly array $wallpapers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->wallpapers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}