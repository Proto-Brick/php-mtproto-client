<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setBotPrecheckoutResults
 */
final class SetBotPrecheckoutResultsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9c2dd95;
    
    public string $_ = 'messages.setBotPrecheckoutResults';
    
    public function getMethodName(): string
    {
        return 'messages.setBotPrecheckoutResults';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param bool|null $success
     * @param string|null $error
     */
    public function __construct(
        public readonly int $queryId,
        public readonly ?bool $success = null,
        public readonly ?string $error = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->success) $flags |= (1 << 1);
        if ($this->error !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->error);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}