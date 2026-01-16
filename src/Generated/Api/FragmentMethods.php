<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Fragment\GetCollectibleInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCollectiblePhone;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCollectibleUsername;
use ProtoBrick\MTProtoClient\Generated\Types\Fragment\CollectibleInfo;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "fragment" group.
 */
final readonly class FragmentMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputCollectibleUsername|InputCollectiblePhone $collectible
     * @return Future<CollectibleInfo|null>
     * @see https://core.telegram.org/method/fragment.getCollectibleInfo
     * @api
     */
    public function getCollectibleInfoAsync(AbstractInputCollectible $collectible): Future
    {
        return $this->client->call(new GetCollectibleInfoRequest(collectible: $collectible));
    }

    /**
     * @param InputCollectibleUsername|InputCollectiblePhone $collectible
     * @return CollectibleInfo|null
     * @see https://core.telegram.org/method/fragment.getCollectibleInfo
     * @api
     */
    public function getCollectibleInfo(AbstractInputCollectible $collectible): ?CollectibleInfo
    {
        return $this->getCollectibleInfoAsync(collectible: $collectible)->await();
    }
}