<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\PremiumSubscriptionOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.premiumPromo
 */
final class PremiumPromo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5334759c;
    
    public string $_ = 'help.premiumPromo';
    
    /**
     * @param string $statusText
     * @param list<AbstractMessageEntity> $statusEntities
     * @param list<string> $videoSections
     * @param list<AbstractDocument> $videos
     * @param list<PremiumSubscriptionOption> $periodOptions
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly string $statusText,
        public readonly array $statusEntities,
        public readonly array $videoSections,
        public readonly array $videos,
        public readonly array $periodOptions,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->statusText);
        $buffer .= $serializer->vectorOfObjects($this->statusEntities);
        $buffer .= $serializer->vectorOfStrings($this->videoSections);
        $buffer .= $serializer->vectorOfObjects($this->videos);
        $buffer .= $serializer->vectorOfObjects($this->periodOptions);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $statusText = $deserializer->bytes($stream);
        $statusEntities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $videoSections = $deserializer->vectorOfStrings($stream);
        $videos = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        $periodOptions = $deserializer->vectorOfObjects($stream, [PremiumSubscriptionOption::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $statusText,
            $statusEntities,
            $videoSections,
            $videos,
            $periodOptions,
            $users
        );
    }
}