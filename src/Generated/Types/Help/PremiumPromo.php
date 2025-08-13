<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PremiumSubscriptionOption;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/help.premiumPromo
 */
final class PremiumPromo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5334759c;
    
    public string $predicate = 'help.premiumPromo';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->statusText);
        $buffer .= Serializer::vectorOfObjects($this->statusEntities);
        $buffer .= Serializer::vectorOfStrings($this->videoSections);
        $buffer .= Serializer::vectorOfObjects($this->videos);
        $buffer .= Serializer::vectorOfObjects($this->periodOptions);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $statusText = Deserializer::bytes($stream);
        $statusEntities = Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']);
        $videoSections = Deserializer::vectorOfStrings($stream);
        $videos = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        $periodOptions = Deserializer::vectorOfObjects($stream, [PremiumSubscriptionOption::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

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