<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'valor',
        'categoria',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getNombre(): string
    {
        return $this->attributes['nombre'];
    }

    public function setNombre(string $nombre): void
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function getValor(): int
    {
        return $this->attributes['valor'];
    }

    public function setValor(int $valor): void
    {
        $this->attributes['valor'] = $valor;
    }

    public function getCategoria(): string
    {
        return $this->attributes['categoria'];
    }

    public function setCategoria(string $categoria): void
    {
        $this->attributes['categoria'] = $categoria;
    }
}
