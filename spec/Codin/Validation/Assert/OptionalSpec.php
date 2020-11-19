<?php declare(strict_types=1);

namespace spec\Codin\Validation\Assert;

use Codin\Validation\Contracts\Constraint;
use PhpSpec\ObjectBehavior;

class OptionalSpec extends ObjectBehavior
{
    public function it_should_validate_against_constraint(Constraint $constraint)
    {
        $this->beConstructedWith($constraint);
        $constraint->isValid('test')->shouldBeCalled()->willReturn(true);
        $this->isValid('test')->shouldReturn(true);
    }

    public function it_should_validate_against_null(Constraint $constraint)
    {
        $this->beConstructedWith($constraint);
        $this->isValid(null)->shouldReturn(true);
    }
}
