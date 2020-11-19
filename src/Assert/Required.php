<?php

declare(strict_types=1);

namespace Codin\Validation\Assert;

use Codin\Validation\Assertion;
use Codin\Validation\Contracts\Constraint;

class Required extends Assertion implements Constraint
{
    protected $message = ':attribute is required';

    public function isValid($value): bool
    {
        return null !== $value;
    }
}
