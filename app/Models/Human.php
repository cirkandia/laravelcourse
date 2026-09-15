<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * HUMAN ATTRIBUTES
 * $this->attributes['id'] - int - contains the human primary key (id)
 * $this->attributes['name'] - string - contains the human name
 * $this->attributes['aura'] - int - contains the human aura level
 * $this->attributes['category'] - string - contains the human category
 *
 * @property int $id
 * @property string $name
 * @property int $aura
 * @property string $category
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Human extends Model
{
    /**
     * The attributes that are mass assignable.
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
