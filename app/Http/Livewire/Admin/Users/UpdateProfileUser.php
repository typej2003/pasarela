<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

use App\Models\User;
use App\Models\DatosBasicos;

class UpdateProfileUser extends Component
{
    use WithFileUploads;

    public $image;

    public $user;

    public $state = [];

    public function mount($user_id)
    {
        $this->user = User::find($user_id);

        $this->state = $this->user->only(['name', 'email']);

        $datosbasicos = DatosBasicos::where('user_id', $user_id)->first();

        if($datosbasicos)
        {
            $this->state['cellphonecode'] = $datosbasicos->cellphonecode;

            $this->state['cellphone'] = $datosbasicos->cellphone;

            $this->state['address'] = $datosbasicos->address;
        }

        
    }

    public function updatedImage()
    {
        $previousPath = $this->user->avatar;

        $path = $this->image->store('/', 'avatars');

        $this->user->update(['avatar' => $path]);

        Storage::disk('avatars')->delete($previousPath);

        $this->dispatchBrowserEvent('updated', ['message' => 'Perfifl cambiado satisfactoriamente!']);
    }

    public function updateProfile()
    {
        $validatedData = Validator::make($this->state, [
			'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
		])->validate();

        $this->user->update([
            'name' => $this->state['name'],
            'email' => $this->state['email']
        ]);

        $this->dispatchBrowserEvent('updated', ['message' => 'Perfil actualizado satisfactoriamente!']);
    }

    public function changePassword()
    {
        $validatedData = Validator::make($this->state, [
			'password' => 'required',
		])->validate();

        if(!empty($validatedData['password'])) {
			$validatedData['password'] = bcrypt($validatedData['password']);
		}

        $this->user->update($validatedData);

        $this->dispatchBrowserEvent('updated', ['message' => 'Contraseña cambiada satisfactoriamente!']);
    }

    public function updateDatosBasicos()
    {
        $validatedData = Validator::make($this->state, [
			'cellphonecode' => 'required',
            'cellphone' => 'required',
            'address' => 'required',
		])->validate();

        $datosbasicos = DatosBasicos::where('user_id', $this->user->id)->first();

        if($datosbasicos)
        {
            $datosbasicos->update($validatedData);
        }
        else{
            $datosbasicos->create($datosbasicos);
        }

        $this->dispatchBrowserEvent('updated', ['message' => 'Datos Basicos actualizado satisfactoriamente!']);
    }

    public function render()
    {
        return view('livewire.admin.users.update-profile-user');
    }
}
