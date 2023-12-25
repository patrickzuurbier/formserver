<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use PatrickZuurbier\FormServer\Contracts\Generators\ClassGeneratorInterface;
use PatrickZuurbier\FormServer\Contracts\Resolvers\ClassResolverInterface;
use PatrickZuurbier\FormServer\Contracts\Resolvers\StubsPathResolverInterface;

class CreateFormFieldCommand extends GeneratorCommand
{
    protected $signature   = 'form:create-field {name} {--form=}';
    protected $description = 'Create a Field class';

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
        if (!$this->option('form')) {
            $this->error('The option --form is required!');

            return false;
        }

        $formClassData = $this->classResolver->resolve('forms', $this->option('form'));

        if (!$this->alreadyExists($formClassData->getClass())) {
            $this->error('The Form ' . $formClassData->getClass() . ' does not exists!');

            return false;
        }

        $fieldClassData = $this->classResolver->resolve(
            'fields',
            $this->option('form') . '\\' . $this->getNameInput(),
        );

        if ($this->alreadyExists($fieldClassData->getClass())) {
            $this->error('The Field already exists!');

            return false;
        }

        $this->makeDirectory($fieldClassData->getClassPath());

        $stub = $this->files->get(
            $this->resolveStubPath('field-class.stub'),
        );

        $stubReplacements = [
            '{{ namespace }}' => $fieldClassData->getNamespace(),
            '{{ class }}'     => $fieldClassData->getClassName(),
            '{{ name }}'      => Str::snake($fieldClassData->getName()),
        ];

        $this->files->put($fieldClassData->getClassPath(), $this->classGenerator->generate($stub, $stubReplacements));

        $this->info('Field created successfully.');

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
