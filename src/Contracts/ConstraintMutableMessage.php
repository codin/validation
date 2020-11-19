<?php

declare(strict_types=1);

namespace Codin\Validation\Contracts;

interface ConstraintMutableMessage extends ConstraintMessage
{
    public function setMessage(string $message): self;
}
