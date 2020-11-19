<?php declare(strict_types=1);

namespace spec\Codin\Validation\Assert;

use Codin\Validation\Contracts\Constraint;
use PhpSpec\ObjectBehavior;

class ContainsSpec extends ObjectBehavior
{
    public function it_should_validate_array(Constraint $constraint)
    {
        $constraint->isValid('test')->shouldBeCalled()->willReturn(true);
        $this->beConstructedWith($constraint);
        $this->isValid(['test'])->shouldReturn(true);
    }
}
