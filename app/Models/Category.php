<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * CATEGORY ATTRIBUTES
 * $this->attributes['id'] - int - contains the category primary key (id)
 * $this->attributes['name'] - string - contains the category name
 * $this->attributes['description'] - string - contains the category description
 * $this->attributes['slug'] - string - contains the category slug
 * $this->attributes['status'] - bool - contains the category status
 * $this->jewels - Jewel[] - contains the associated jewels
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $slug
 * @property bool $status
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $subcategories
 * @property-read Collection|Product[] $products
 */
class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug', 'status', 'parent_id'];

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
        return strtoupper($this->attributes['name']);
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
        $this->attributes['status'] = !$this->attributes['status'];
        $this->save();
    }

    public function jewels(): HasMany
    {
        // Assuming a Jewel model will exist
        return $this->hasMany('App\Models\Jewel');
    }

    public function getJewels(): Collection
    {
        return $this->jewels;
    }

    public function setJewels(Collection $jewels): void
    {
        $this->jewels = $jewels;
    }

    public function products(): HasMany
    {
        // Assuming a Product model will exist linked to categories
        return $this->hasMany(Product::class);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function setProducts(Collection $products): void
    {
        $this->products = $products;
    }

    public function subcategories(): HasMany
    {
        // Assuming parent_id is used for child categories
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getSubcategories(): Collection
    {
        return $this->subcategories;
    }

    public function setSubcategories(Collection $subcategories): void
    {
        $this->subcategories = $subcategories;
    }

    public function getParentId(): ?int
    {
        return $this->attributes['parent_id'];
    }

    public function setParentId(?int $parentId): void
    {
        $this->attributes['parent_id'] = $parentId;
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
