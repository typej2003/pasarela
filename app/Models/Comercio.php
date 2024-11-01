<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_NOACTIVE = 'noactive';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'userId',
    ];

    public function propietario()
    {
        $propietario = User::find($this->userId);
        return $propietario->name;
        
    }

    public function getPropietario()
    {
        $propietario = User::find($this->userId);
        return $propietario;        
    }

    public function OperacionNoConfirmada()
    {
        return Transaccion::query()
            ->where('comercioId', $this->id)
            ->where('status', 'norevisado')
            ->count();
    }

    
}
