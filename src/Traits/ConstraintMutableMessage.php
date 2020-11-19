<?php

declare(strict_types=1);

namespace Codin\Validation\Traits;

trait ConstraintMutableMessage
{
    use ConstraintMessage;

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
