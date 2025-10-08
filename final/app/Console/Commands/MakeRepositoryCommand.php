<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepositoryCommand extends Command
{
    protected $signature = 'make:repository {name} {model?}';
    protected $description = 'Create a new repository class';
    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $modelArg = $this->argument('model');

        $path = app_path("Repositories/{$name}.php");
        $directory = dirname($path);

        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        if ($this->files->exists($path)) {
            $this->error("Repository already exists!");
            return 1;
        }

        // Extract class name and namespace
        $className = basename(str_replace('\\', '/', $name));
        $dirName = dirname(str_replace('\\', '/', $name));

        $namespace = $dirName === '.' || $dirName === ''
            ? 'App\\Repositories'
            : 'App\\Repositories\\' . str_replace('/', '\\', $dirName);

        // Determine the model name automatically
        if ($modelArg) {
            $modelFqn = $this->qualifyModel($modelArg);
        } else {
            // Infer from repository name (e.g., TeacherRepository → Teacher)
            $modelName = preg_replace('/Repository$/', '', $className);
            $modelFqn = "App\\Models\\{$modelName}";
        }

        $stub = $this->getStub();
        $content = str_replace(
            ['DummyClass', 'DummyNamespace', 'DummyModelFQN', 'DummyModel'],
            [$className, $namespace, $modelFqn, class_basename($modelFqn)],
            $stub
        );

        $this->files->put($path, $content);
        $this->info("Repository created successfully: {$path}");

        return 0;
    }

    protected function qualifyModel(string $model): string
    {
        $model = str_replace('/', '\\', trim($model, '\\'));
        return str_starts_with($model, 'App\\Models\\')
            ? $model
            : "App\\Models\\{$model}";
    }

    protected function getStub()
    {
        return <<<'EOT'
<?php

namespace DummyNamespace;

use DummyModelFQN;

class DummyClass
{
    public function __construct(protected DummyModel $model)
    {
        //
    }

    // Repository methods here
}
EOT;
    }
}
