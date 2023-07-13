<?php

namespace Loader;

use DomainException;

class EnvFileLine
{
    private const DELIMITER = '=';
    private string $line;

    public function __construct(string $line)
    {
        if (false === str_contains($line, self::DELIMITER)) {
            throw new DomainException('Нет "' . self::DELIMITER . '" в строке env файла');
        }

        if ('' === trim(strstr($line, self::DELIMITER, true))) {
            throw new DomainException('Название переменной в env файле не может быть пустым');
        }

        $this->line = $line;
    }

    public function getEnvironmentVariable(): EnvironmentVariable
    {
        $environmentVariable = explode(self::DELIMITER, $this->line);
        return new EnvironmentVariable($environmentVariable[1], $environmentVariable[0]);
    }

}