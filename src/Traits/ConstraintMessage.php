<?php

declare(strict_types=1);

namespace Codin\Validation\Traits;

trait ConstraintMessage
{
    protected $message = ':attribute is not valid';

    public function getMessage(string $attribute): string
    {
        return str_replace(':attribute', $attribute, $this->message);
    }
}
