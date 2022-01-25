<?php

namespace Vgplay\MiniGame;

use Illuminate\Support\ServiceProvider;
use Vgplay\MiniGame\Console\LuckyGame\MakeLuckyGameLogMigration;
use Vgplay\MiniGame\Console\LuckyGame\MakeLuckyGameLogModel;
use Vgplay\MiniGame\Console\MakeLuckyGame;

class MiniGameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            MakeLuckyGame::class,
            MakeLuckyGameLogModel::class,
            MakeLuckyGameLogMigration::class
        ]);
    }
}
