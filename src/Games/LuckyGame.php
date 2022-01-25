<?php

namespace Vgplay\MiniGame\Games;

use Contracts\MiniGame;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Vgplay\MiniGame\Contracts\Player;
use Vgplay\MiniGame\Exceptions\EmptyPoolException;

abstract class LuckyGame extends MiniGame
{
    protected $result;

    abstract protected function getPool(Player $player): Collection;

    public function play(Player $player, $count = 1)
    {
        $pool = $this->getPool($player);

        if ($pool->count() == 0) {
            throw new EmptyPoolException();
        }

        DB::transaction(function () use ($player, $count, $pool) {
            $this->pay($player, $count);
            $this->result = $pool->shuffle()->random($count);
            $this->saveLog($player, $this->result);
        });

        return $this->response($player);
    }

    protected function response(Player $player)
    {
        return $this->result;
    }
}
