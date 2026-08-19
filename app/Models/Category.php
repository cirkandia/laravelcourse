<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->attributes['description'] - string - contains the category description
     * $this->attributes['slug'] - string - contains the category slug
     * $this->attributes['status'] - bool - contains the category status
     * $this->jewels - Jewel[] - contains the associated jewels
     */
    protected $fillable = ['name', 'description', 'slug', 'status'];

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

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getSlug(): string
    {
        return $this->attributes['slug'];
    }

    public function setSlug(string $slug): void
    {
        $this->attributes['slug'] = $slug;
    }

    public function getStatus(): bool
    {
        return $this->attributes['status'];
    }

    public function setStatus(bool $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function toggleStatus(): void
    {
        $this->attributes['status'] = ! $this->attributes['status'];
        $this->save();
    }

    public function jewels()
    {
        // Assuming a Jewel model will exist
        return $this->hasMany('App\Models\Jewel');
    }

    public function getProducts()
    {
        // Assuming a Product model will exist linked to categories
        return $this->hasMany(Product::class);
    }

    public function getSubcategory()
    {
        // Assuming parent_id is used for child categories
        return $this->hasMany(Category::class, 'parent_id');
    }
}
