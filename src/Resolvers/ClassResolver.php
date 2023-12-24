<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Resolvers;

use Illuminate\Contracts\Config\Repository as Config;
use PatrickZuurbier\FormServer\Contracts\Resolvers\ClassResolverInterface;
use PatrickZuurbier\FormServer\Data\ClassData;

class ClassResolver implements ClassResolverInterface
{
    protected string $type;

    public function __construct(
        protected Config $config,
    ) {
    }

    public function resolve(string $type, string $class): ClassData
    {
        $this->type = $type;

        $className = $this->extractClassName($class);

        $namespace = $this->getNamespace($class, $className);

        return new ClassData($type, $namespace, $className);
    }

    protected function extractClassName(string $class): string
    {
        $classParts = explode('\\', $class);

        return array_pop($classParts);
    }

    protected function getNamespace(string $class, string $className): string
    {
        /** @var string $classRoot */
        $classRoot = $this->config->get('formserver.namespaces.' . $this->type);

        $removeStrings = explode('\\', $classRoot);

        $removeStrings[] = $className;

        $subNamespace = trim(str_replace($removeStrings, '', $class), '\\');

        return $classRoot . '\\' . $subNamespace;
    }
}
