<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Photos;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\Photo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/photos.updateProfilePhoto
 */
final class UpdateProfilePhotoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9e82039;
    
    public string $predicate = 'photos.updateProfilePhoto';
    
    public function getMethodName(): string
    {
        return 'photos.updateProfilePhoto';
    }
    
    public function getResponseClass(): string
    {
        return Photo::class;
    }
    /**
     * @param AbstractInputPhoto $id
     * @param true|null $fallback
     * @param AbstractInputUser|null $bot
     */
    public function __construct(
        public readonly AbstractInputPhoto $id,
        public readonly ?true $fallback = null,
        public readonly ?AbstractInputUser $bot = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fallback) {
            $flags |= (1 << 0);
        }
        if ($this->bot !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->bot->serialize();
        }
        $buffer .= $this->id->serialize();
        return $buffer;
    }
}