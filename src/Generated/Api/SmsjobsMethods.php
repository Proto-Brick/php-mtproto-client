<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\FinishJobRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\GetSmsJobRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\GetStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\IsEligibleToJoinRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\JoinRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\LeaveRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Smsjobs\UpdateSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SmsJob;
use ProtoBrick\MTProtoClient\Generated\Types\Smsjobs\EligibilityToJoin;
use ProtoBrick\MTProtoClient\Generated\Types\Smsjobs\Status;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "smsjobs" group.
 */
final readonly class SmsjobsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @return Future<EligibilityToJoin|null>
     * @see https://core.telegram.org/method/smsjobs.isEligibleToJoin
     * @api
     */
    public function isEligibleToJoinAsync(): Future
    {
        return $this->client->call(new IsEligibleToJoinRequest());
    }

    /**
     * @return EligibilityToJoin|null
     * @see https://core.telegram.org/method/smsjobs.isEligibleToJoin
     * @api
     */
    public function isEligibleToJoin(): ?EligibilityToJoin
    {
        return $this->isEligibleToJoinAsync()->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/smsjobs.join
     * @api
     */
    public function joinAsync(): Future
    {
        return $this->client->call(new JoinRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.join
     * @api
     */
    public function join(): bool
    {
        return (bool) $this->joinAsync()->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/smsjobs.leave
     * @api
     */
    public function leaveAsync(): Future
    {
        return $this->client->call(new LeaveRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.leave
     * @api
     */
    public function leave(): bool
    {
        return (bool) $this->leaveAsync()->await();
    }

    /**
     * @param bool|null $allowInternational
     * @return Future<bool>
     * @see https://core.telegram.org/method/smsjobs.updateSettings
     * @api
     */
    public function updateSettingsAsync(?bool $allowInternational = null): Future
    {
        return $this->client->call(new UpdateSettingsRequest(allowInternational: $allowInternational));
    }

    /**
     * @param bool|null $allowInternational
     * @return bool
     * @see https://core.telegram.org/method/smsjobs.updateSettings
     * @api
     */
    public function updateSettings(?bool $allowInternational = null): bool
    {
        return (bool) $this->updateSettingsAsync(allowInternational: $allowInternational)->await();
    }

    /**
     * @return Future<Status|null>
     * @see https://core.telegram.org/method/smsjobs.getStatus
     * @api
     */
    public function getStatusAsync(): Future
    {
        return $this->client->call(new GetStatusRequest());
    }

    /**
     * @return Status|null
     * @see https://core.telegram.org/method/smsjobs.getStatus
     * @api
     */
    public function getStatus(): ?Status
    {
        return $this->getStatusAsync()->await();
    }

    /**
     * @param string $jobId
     * @return Future<SmsJob|null>
     * @see https://core.telegram.org/method/smsjobs.getSmsJob
     * @api
     */
    public function getSmsJobAsync(string $jobId): Future
    {
        return $this->client->call(new GetSmsJobRequest(jobId: $jobId));
    }

    /**
     * @param string $jobId
     * @return SmsJob|null
     * @see https://core.telegram.org/method/smsjobs.getSmsJob
     * @api
     */
    public function getSmsJob(string $jobId): ?SmsJob
    {
        return $this->getSmsJobAsync(jobId: $jobId)->await();
    }

    /**
     * @param string $jobId
     * @param string|null $error
     * @return Future<bool>
     * @see https://core.telegram.org/method/smsjobs.finishJob
     * @api
     */
    public function finishJobAsync(string $jobId, ?string $error = null): Future
    {
        return $this->client->call(new FinishJobRequest(jobId: $jobId, error: $error));
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
        return (bool) $this->finishJobAsync(jobId: $jobId, error: $error)->await();
    }
}