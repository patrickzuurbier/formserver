<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use PatrickZuurbier\FormServer\Contracts\Generators\ClassGeneratorInterface;
use PatrickZuurbier\FormServer\Contracts\Resolvers\ClassResolverInterface;
use PatrickZuurbier\FormServer\Contracts\Resolvers\StubsPathResolverInterface;

class CreateFormCommand extends GeneratorCommand
{
    protected $signature   = 'form:create {name}';
    protected $description = 'Create a Form class';

    public function __construct(
        Filesystem                           $files,
        protected ClassResolverInterface     $classResolver,
        protected StubsPathResolverInterface $stubsPathResolver,
        protected ClassGeneratorInterface    $classGenerator,
    ) {
        parent::__construct($files);
    }

    public function handle(): ?bool
    {
        $classData = $this->classResolver->resolve('forms', $this->argument('name'));

        if ($this->alreadyExists($classData->getClass())) {
            $this->error('The Form already exists!');

            return false;
        }

        $this->makeDirectory($classData->getClassPath());

        $stub = $this->files->get(
            $this->resolveStubPath('form-class.stub'),
        );

        $stubReplacements = [
            '{{ namespace }}' => $classData->getNamespace(),
            '{{ class }}'     => $classData->getClassName(),
        ];

        $this->files->put($classData->getClassPath(), $this->classGenerator->generate($stub, $stubReplacements));

        $this->info('Form created successfully.');

        return null;
    }

    protected function resolveStubPath(string $stub): string
    {
        return $this->files->exists($customPath = $this->stubsPathResolver->resolveAppPath($stub))
            ? $customPath
            : $this->stubsPathResolver->resolvePackagePath($stub);
    }

    protected function getStub(): string
    {
        // This is an unused implementation of the abstract method of
        return '';
    }
}
