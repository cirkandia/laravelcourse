<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'aura',
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

    public function getAura(): int
    {
        return $this->attributes['aura'];
    }

    public function setAura(int $aura): void
    {
        $this->attributes['aura'] = $aura;
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
