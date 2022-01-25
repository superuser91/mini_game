<?php

namespace Vgplay\MiniGame\Console\LuckyGame;

use Illuminate\Console\GeneratorCommand;

class MakeLuckyGameLogModel extends GeneratorCommand
{
    protected $name = 'make:lucky-game:log';

    protected $description = 'Create a new lucky game log model';

    protected $type = 'LuckyGameLog';

    protected function getStub()
    {
        return __DIR__ . '/stubs/LuckyGameLog.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '';
    }

    public function handle()
    {
        parent::handle();

        $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        $class = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($class);

        $content = file_get_contents($path);

        file_put_contents(app_path(sprintf("Models/%s.php", ucfirst($this->getNameInput()))), $content);

        $this->call('make:lucky-game:migration', [$this->getNameInput()]);
    }
}
