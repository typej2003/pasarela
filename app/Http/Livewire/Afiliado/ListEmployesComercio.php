<?php

namespace App\Http\Livewire\Afiliado;

use Livewire\Component;

class ListEmployesComercio extends Component
{
    public $comercio_id;

    public function mount($comercio_id = 1)
    {
        $this->comercio_id = $comercio_id;
    }

    public function render()
    {
        return view('livewire.afiliado.list-employes-comercio');
    }
}
