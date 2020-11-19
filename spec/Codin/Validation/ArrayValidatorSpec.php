<?php

declare(strict_types=1);

namespace spec\Codin\Validation;

use Codin\Validation\Contracts\CallbackValidator;
use Codin\Validation\Contracts\Constraint;
use PhpSpec\ObjectBehavior;

class ArrayValidatorSpec extends ObjectBehavior
{
    public function it_should_add_constraints(Constraint $constraint)
    {
        $this->addConstraint('foo', $constraint);
        $this->getConstraints()->shouldHaveKey('foo');
    }

    public function it_should_add_many_constraints(Constraint $constraint)
    {
        $this->addConstraints('foo', [$constraint]);
        $this->getConstraints()->shouldHaveKey('foo');
    }

    public function it_should_return_violations()
    {
        $this->validate(['foo' => 'bar'])->shouldReturnAnInstanceOf(\Codin\Validation\Violations::class);
    }

    public function it_should_return_validate_nested(Constraint $constraint)
    {
        $payload = [
            'foo' => [
                'bar' => 'baz',
            ],
        ];

        $constraint->isValid('baz')->shouldBeCalled()->willReturn(true);
        $this->addConstraints('foo.bar', [$constraint]);
        $this->validate($payload)->count()->shouldReturn(0);
    }

    public function it_should_validate_closure()
    {
        $payload = [
            'foo' => 'bar',
        ];

        $this->addConstraint('foo', function (string $value, CallbackValidator $failure) {
            if (!is_int($value)) {
                return $failure->setMessage('bang');
            }
        });

        $violations = $this->validate($payload);
        $violations->count()->shouldReturn(1);
        $violations->getMessagesLine()->shouldReturn('bang');
    }

    public function it_should_validate_closure_but_passes_with_no_callback_validator_returned()
    {
        $payload = [
            'foo' => 'bar',
        ];

        $this->addConstraint('foo', function (string $value, CallbackValidator $failure) {
            if (is_string($value)) {
                return;
            }

            return $failure->setMessage('foo is not a string');
        });

        $this->validate($payload)->count()->shouldReturn(0);
    }
}
