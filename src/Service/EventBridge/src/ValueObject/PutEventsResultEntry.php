<?php

namespace AsyncAws\EventBridge\ValueObject;

/**
 * Represents an event that failed to be submitted. For information about the errors that are common to all actions, see
 * Common Errors [^1].
 *
 * [^1]: https://docs.aws.amazon.com/eventbridge/latest/APIReference/CommonErrors.html
 */
final class PutEventsResultEntry
{
    /**
     * The ID of the event.
     *
     * @var string|null
     */
    private $eventId;

    /**
     * The error code that indicates why the event submission failed.
     *
     * @var string|null
     */
    private $errorCode;

    /**
     * The error message that explains why the event submission failed.
     *
     * @var string|null
     */
    private $errorMessage;

    /**
     * @param array{
     *   EventId?: null|string,
     *   ErrorCode?: null|string,
     *   ErrorMessage?: null|string,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->eventId = $input['EventId'] ?? null;
        $this->errorCode = $input['ErrorCode'] ?? null;
        $this->errorMessage = $input['ErrorMessage'] ?? null;
    }

    /**
     * @param array{
     *   EventId?: null|string,
     *   ErrorCode?: null|string,
     *   ErrorMessage?: null|string,
     * }|PutEventsResultEntry $input
     */
    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getEventId(): ?string
    {
        return $this->eventId;
    }
}
