<?php

namespace Domain\Bloco\Actions;

use Domain\Bloco\Models\Bloco;
use Illuminate\Database\Eloquent\Collection;

class IndexBlocoAction
{
    public function __invoke(): Collection
    {
        return Bloco::all();
    }
}
