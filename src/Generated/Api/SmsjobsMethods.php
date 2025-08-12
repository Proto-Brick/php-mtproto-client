<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\FinishJobRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\GetSmsJobRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\GetStatusRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\IsEligibleToJoinRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\JoinRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\LeaveRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Smsjobs\UpdateSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\SmsJob;
use DigitalStars\MtprotoClient\Generated\Types\Smsjobs\EligibilityToJoin;
use DigitalStars\MtprotoClient\Generated\Types\Smsjobs\Status;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "smsjobs" group.
 */
final readonly class SmsjobsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @return EligibilityToJoin|null
     * @see https://core.telegram.org/method/smsjobs.isEligibleToJoin
     * @api
     */
    public function isEligibleToJoin(): ?EligibilityToJoin
    {
        return $this->client->callSync(new IsEligibleToJoinRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.join
     * @api
     */
    public function join(): bool
    {
        return (bool) $this->client->callSync(new JoinRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.leave
     * @api
     */
    public function leave(): bool
    {
        return (bool) $this->client->callSync(new LeaveRequest());
    }

    /**
     * @param bool|null $allowInternational
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.updateSettings
     * @api
     */
    public function updateSettings(?bool $allowInternational = null): bool
    {
        return (bool) $this->client->callSync(new UpdateSettingsRequest($allowInternational));
    }

    /**
     * @return Status|null
     * @see https://core.telegram.org/method/smsjobs.getStatus
     * @api
     */
    public function getStatus(): ?Status
    {
        return $this->client->callSync(new GetStatusRequest());
    }

    /**
     * @param string $jobId
     * @return SmsJob|null
     * @see https://core.telegram.org/method/smsjobs.getSmsJob
     * @api
     */
    public function getSmsJob(string $jobId): ?SmsJob
    {
        return $this->client->callSync(new GetSmsJobRequest($jobId));
    }

    /**
     * @param string $jobId
     * @param string|null $error
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.finishJob
     * @api
     */
    public function finishJob(string $jobId, ?string $error = null): bool
    {
        return (bool) $this->client->callSync(new FinishJobRequest($jobId, $error));
    }
}