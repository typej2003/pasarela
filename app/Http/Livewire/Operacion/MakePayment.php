<?php

namespace App\Http\Livewire\Operacion;

use Livewire\Component;

class MakePayment extends Component
{
    public $comercio_id;
    
    public function mount($comercio_id=0)
    {
        $this->comercio_id = $comercio_id;
    }
    public function render()
    {
        return view('livewire.operacion.make-payment');
    }
}
