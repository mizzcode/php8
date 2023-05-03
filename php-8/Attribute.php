<?php

require_once "ValidationException.php";

#[Attribute()]
class NotBlank
{
}

#[Attribute()]
class Length
{
    public int $min;
    public int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}

class Register
{
    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?string $username;

    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?string $password;

    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?int $pin = 123456;
}

class Login
{
    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?string $username;

    #[NotBlank]
    #[Length(min: 8, max: 16)]
    public ?string $password;

    #[NotBlank]
    #[Length(min: 8, max: 16)]
    public ?int $pin;
}

function validate(object $object): void
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();

    foreach ($properties as $property) {
        validateNotBlank($property, $object);
        validateLength($property, $object);
    }
}

function validateNotBlank(ReflectionProperty $property, object $object): void
{
    $attributes = $property->getAttributes(NotBlank::class);

    if (count($attributes) > 0) {
        if (!$property->isInitialized($object)) {
            throw new ValidationException("Property $property->name is null");
        } else if ($property->getValue($object) == null) {
            throw new ValidationException("Property $property->name is null");
        }
    }
}

function validateLength(ReflectionProperty $property, object $object): void
{
    if (!$property->isInitialized($object) || $property->getValue($object) == null) {
        return; // cancel validate because validate will be execute by validateNotBlank
    }

    $value = $property->getValue($object);
    $attributes = $property->getAttributes(Length::class);

    foreach ($attributes as $attribute) {
        $length = $attribute->newInstance();
        $valueLength = strlen($value);

        if ($valueLength < $length->min) {
            throw new ValidationException("Property $property->name is too short");
        } else if ($valueLength > $length->max) {
            throw new ValidationException("Property $property->name is too long");
        }
    }
}

$request = new Register;
$request->username = 'mizz';
$request->password = 'mizz';

// $request = new Login;
// $request->username = "mizz";
// $request->password = 'mizzjani';

validate($request);
