<?php

declare(strict_types=1);

namespace Codin\Validation\Assert;

use Codin\Validation\Assertion;
use Codin\Validation\Contracts\Constraint;

class Optional extends Assertion implements Constraint
{
    /**
     * @var Constraint
     */
    protected $constraint;

    /**
     * @param array<string> $values
     */
    public function __construct(Constraint $constraint)
    {
        $this->constraint = $constraint;
    }

    public function getMessage(string $attribute): string
    {
        return $this->constraint->getMessage($attribute);
    }

    public function isValid($value): bool
    {
        return null === $value || $this->constraint->isValid($value);
    }
}
