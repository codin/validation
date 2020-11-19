<?php

declare(strict_types=1);

namespace Codin\Validation\Assert;

use Codin\Validation\Assertion;
use Codin\Validation\Contracts\Constraint;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email extends Assertion implements Constraint
{
    protected $message = ':attribute is not a valid email address';

    public function isValid($value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        $validator = new EmailValidator();

        return $validator->isValid($value, new RFCValidation());
    }
}
