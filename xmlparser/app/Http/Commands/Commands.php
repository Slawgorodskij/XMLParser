<?php

namespace App\Http\Commands;

interface Commands
{
    public function start($pathToFile): array|string;

    public function choosingActions(): void;

}
