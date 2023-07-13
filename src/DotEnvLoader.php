<?php

namespace Loader;

class DotEnvLoader
{
    public function load(string $pathToEnvFile): void
    {
        $envFile = new EnvFile($pathToEnvFile);
        while (false === $envFile->eof()) {
            $line = new EnvFileLine($envFile->fgets());
            $environmentVariable = $line->getEnvironmentVariable();
            $_SERVER[$environmentVariable->name] = $environmentVariable->value;
        }
    }
}