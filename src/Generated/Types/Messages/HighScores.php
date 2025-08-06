<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\HighScore;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.highScores
 */
final class HighScores extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a3bfd99;
    
    public string $_ = 'messages.highScores';
    
    /**
     * @param list<HighScore> $scores
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $scores,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->scores);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $scores = $deserializer->vectorOfObjects($stream, [HighScore::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $scores,
            $users
        );
    }
}