<?php

namespace Contracts;

use Vgplay\MiniGame\Contracts\Player;

abstract class MiniGame
{
    abstract protected function pay(Player $player, $amount);
    abstract protected function saveLog(Player $player, $data);
}
