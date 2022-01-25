<?php

namespace Vgplay\MiniGame\Console\LuckyGame;

use Illuminate\Console\GeneratorCommand;

class MakeLuckyGameLogMigration extends GeneratorCommand
{
    protected $name = 'make:lucky-game:migration';

    protected $description = 'Create a new lucky game';

    protected $type = 'LuckyGameMigration';

    protected function getStub()
    {
        return __DIR__ . '/stubs/lucky_game_log_migration.php.stub';
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

        file_put_contents(database_path(sprintf("migrations/%s_%s.php", now(), ucfirst($this->getNameInput()))), $content);
    }
}
