<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Langpack\GetDifferenceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Langpack\GetLangPackRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Langpack\GetLanguageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Langpack\GetLanguagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Langpack\GetStringsRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractLangPackString;
use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackDifference;
use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackLanguage;
use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackString;
use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackStringDeleted;
use DigitalStars\MtprotoClient\Generated\Types\Base\LangPackStringPluralized;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "langpack" group.
 */
final readonly class LangpackMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param string $langPack
     * @param string $langCode
     * @return LangPackDifference|null
     * @see https://core.telegram.org/method/langpack.getLangPack
     * @api
     */
    public function getLangPack(string $langPack, string $langCode): ?LangPackDifference
    {
        return $this->client->callSync(new GetLangPackRequest($langPack, $langCode));
    }

    /**
     * @param string $langPack
     * @param string $langCode
     * @param list<string> $keys
     * @return list<LangPackString|LangPackStringPluralized|LangPackStringDeleted>
     * @see https://core.telegram.org/method/langpack.getStrings
     * @api
     */
    public function getStrings(string $langPack, string $langCode, array $keys): array
    {
        return $this->client->callSync(new GetStringsRequest($langPack, $langCode, $keys));
    }

    /**
     * @param string $langPack
     * @param string $langCode
     * @param int $fromVersion
     * @return LangPackDifference|null
     * @see https://core.telegram.org/method/langpack.getDifference
     * @api
     */
    public function getDifference(string $langPack, string $langCode, int $fromVersion): ?LangPackDifference
    {
        return $this->client->callSync(new GetDifferenceRequest($langPack, $langCode, $fromVersion));
    }

    /**
     * @param string $langPack
     * @return list<LangPackLanguage>
     * @see https://core.telegram.org/method/langpack.getLanguages
     * @api
     */
    public function getLanguages(string $langPack): array
    {
        return $this->client->callSync(new GetLanguagesRequest($langPack));
    }

    /**
     * @param string $langPack
     * @param string $langCode
     * @return LangPackLanguage|null
     * @see https://core.telegram.org/method/langpack.getLanguage
     * @api
     */
    public function getLanguage(string $langPack, string $langCode): ?LangPackLanguage
    {
        return $this->client->callSync(new GetLanguageRequest($langPack, $langCode));
    }
}