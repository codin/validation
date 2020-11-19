<?php

declare(strict_types=1);

namespace Codin\Validation\Contracts;

interface Constraint extends ConstraintMessage
{
    /**
     * Return true if the value passes constraint rule
     *
     * @param string|array|null $value
     * @return bool
     */
    public function isValid($value): bool;
}
