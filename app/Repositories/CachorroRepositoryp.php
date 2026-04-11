<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CachorroRepositoryp
{
    protected Collection $items;

    public function __construct()
    {
        $this->items = collect(config('prace'));
    }

    public static function query(): self
    {
        return new self();
    }

    public function where(string $key, $value): self
    {
        $this->items = $this->items->where($key, $value);
        return $this;
    }

    public function search(string $term): self
    {
        $term = strtolower($term);

        $this->items = $this->items->filter(function ($item) use ($term) {
            return str_contains(strtolower($item['description']), $term)
                || str_contains(strtolower($item['slug']), $term);
        });

        return $this;
    }

    public function orderBy(string $key, string $direction = 'asc'): self
    {
        $this->items = $direction === 'asc'
            ? $this->items->sortBy($key)
            : $this->items->sortByDesc($key);

        return $this;
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        $page = request('page', 1);

        $results = $this->items
            ->slice(($page - 1) * $perPage, $perPage)
            ->values();

        return new LengthAwarePaginator(
            $results,
            $this->items->count(),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }

    public function get(): Collection
    {
        return $this->items->values();
    }

    public static function find($id): ?array
    {
        return collect(config('cachorros'))->firstWhere('id', $id);
    }

    public static function findBySlug($slug): ?array
    {
        return collect(config('cachorros'))->firstWhere('slug', $slug);
    }

    public function filterByCategory(string $category): self
    {
        // Vous pouvez ajouter une logique de catégorie si vous ajoutez ce champ plus tard
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->items = $this->items->take($limit);
        return $this;
    }
}
