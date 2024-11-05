<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

use App\Models\DatosBasicos;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $image;

    public $state = [];

    public function mount()
    {
        $this->state = auth()->user()->only(['name', 'email']);

        $datosbasicos = DatosBasicos::where('user_id', auth()->user()->id)->first();

        $this->state['cellphonecode'] = $datosbasicos->cellphonecode;

        $this->state['cellphone'] = $datosbasicos->cellphone;

        $this->state['address'] = $datosbasicos->address;
    }

    public function updatedImage()
    {
        $previousPath = auth()->user()->avatar;

        $path = $this->image->store('/', 'avatars');

        auth()->user()->update(['avatar' => $path]);

        Storage::disk('avatars')->delete($previousPath);

        $this->dispatchBrowserEvent('updated', ['message' => 'Profile changed successfully!']);
    }

    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'name' => $this->state['name'],
            'email' => $this->state['email']
        ]);

        $this->emit('nameChanged', auth()->user()->name);

        $this->dispatchBrowserEvent('updated', ['message' => 'Perfil actualizado satisfactoriamente!']);
    }

    public function changePassword(UpdatesUserPasswords $updater)
    {
        $updater->update(
            auth()->user(),
            $attributes = Arr::only($this->state, ['current_password', 'password', 'password_confirmation'])
        );

        collect($attributes)->map(fn ($value, $key) => $this->state[$key] = '');

        $this->dispatchBrowserEvent('updated', ['message' => 'Contraseña cambiada satisfactoriamente!']);
    }

    public function updateDatosBasicos()
    {
        $validatedData = Validator::make($this->state, [
			'cellphonecode' => 'required',
            'cellphone' => 'required',
            'address' => 'required',
		])->validate();

        $datosbasicos = DatosBasicos::where('user_id', auth()->user()->id)->first();

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
        return view('livewire.admin.profile.update-profile');
    }
}
