<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Fragment\GetCollectibleInfoRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCollectible;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCollectiblePhone;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCollectibleUsername;
use DigitalStars\MtprotoClient\Generated\Types\Fragment\CollectibleInfo;


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
     * @return CollectibleInfo|null
     * @see https://core.telegram.org/method/fragment.getCollectibleInfo
     * @api
     */
    public function getCollectibleInfo(AbstractInputCollectible $collectible): ?CollectibleInfo
    {
        return $this->client->callSync(new GetCollectibleInfoRequest($collectible));
    }
}