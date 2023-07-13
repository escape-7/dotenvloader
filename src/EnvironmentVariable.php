<?php

namespace Loader;

class EnvironmentVariable
{
    public readonly string $value;
    public readonly string $name;

    public function __construct(string $value, string $name)
    {
        $this->value = $value;
        $this->name = $name;
    }

}