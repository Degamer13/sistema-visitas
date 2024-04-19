<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlDeVisita extends Model
{
    use HasFactory;

    protected $table = 'control_visitas';
    protected $primaryKey = 'id'; // El nombre correcto de la propiedad es primaryKey, no primarikey
    protected $fillable = ['id_visita', 'hora_entrada', 'hora_salida'];
    public $timestamps = false;

    public function visita()
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id');
    }
}
