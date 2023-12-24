<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Data;

use Illuminate\Support\Str;

class ClassData
{
    public function __construct(
        protected string $type,
        protected string $namespace,
        protected string $className,
    ) {
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getName(): string
    {
        $classSuffix = Str::singular($this->type);

        $typeLength = strlen($classSuffix);
        if (substr($this->className, -1 * $typeLength, $typeLength) === ucfirst($classSuffix)) {
            return substr($this->className, 0, -1 * $typeLength);
        }

        return $this->className;
    }

    public function getClass(): string
    {
        return $this->namespace . '\\' . $this->className;
    }

    public function getClassPath(): string
    {
        return str_replace('\\', DIRECTORY_SEPARATOR, $this->getClass() . '.php');
    }

    /**
     * @return array<string, string>
     */
    public function getClassInfo(): array
    {
        return [
            'namespace' => $this->namespace,
            'className' => $this->className,
            'name'      => $this->getName(),
            'class'     => $this->getClass(),
            'classPath' => $this->getClassPath(),
        ];
    }
}
