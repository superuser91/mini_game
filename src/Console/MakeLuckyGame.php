<?php

namespace Vgplay\MiniGame\Console;

use Illuminate\Console\GeneratorCommand;

class MakeLuckyGame extends GeneratorCommand
{
    protected $name = 'make:lucky-game';

    protected $description = 'Create a new lucky game';

    protected $type = 'LuckyGame';

    protected function getStub()
    {
        return __DIR__ . '/LuckyGame/stubs/LuckyGame.php.stub';
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

        file_put_contents(app_path(sprintf('Services/MiniGame/%s.php', ucfirst($this->getNameInput()))), $content);

        $this->call('make:lucky-game:model', [$this->getNameInput()]);
    }
}
