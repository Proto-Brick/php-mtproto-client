<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPremiumSubscriptionOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.premiumPromo
 */
final class PremiumPromo extends AbstractPremiumPromo
{
    public const CONSTRUCTOR_ID = 1395946908;
    
    public string $_ = 'help.premiumPromo';
    
    /**
     * @param string $statusText
     * @param list<AbstractMessageEntity> $statusEntities
     * @param list<string> $videoSections
     * @param list<AbstractDocument> $videos
     * @param list<AbstractPremiumSubscriptionOption> $periodOptions
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $statusText = $deserializer->bytes($stream);
        $statusEntities = $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $videoSections = $deserializer->vectorOfStrings($stream);
        $videos = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        $periodOptions = $deserializer->vectorOfObjects($stream, [AbstractPremiumSubscriptionOption::class, 'deserialize']);
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