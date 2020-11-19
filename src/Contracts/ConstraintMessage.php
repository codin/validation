<?php

declare(strict_types=1);

namespace Codin\Validation\Contracts;

interface ConstraintMessage
{
    public function getMessage(string $attribute): string;
}
