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
        'name',
        'aura',
        'category',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getAura(): int
    {
        return $this->attributes['aura'];
    }

    public function setAura(int $aura): void
    {
        $this->attributes['aura'] = $aura;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory(string $category): void
    {
        $this->attributes['category'] = $category;
    }

    public function isCommon(): bool
    {
        return strtolower($this->getCategory()) === 'common';
    }

    public function isModerate(): bool
    {
        return strtolower($this->getCategory()) === 'moderate';
    }

    public function isLegendary(): bool
    {
        return strtolower($this->getCategory()) === 'legendary';
    }
}
