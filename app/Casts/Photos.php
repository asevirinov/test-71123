<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Photos implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return array
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): array
    {
        $photos = [];

        foreach (json_decode($value) as $item) {
            $photos[]['url'] = $item;
        }

        return $photos;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return string
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        $photos = [];

        foreach ($value as $item) {
            if (!empty($item['url'])) {
                $photos[] = $item['url'];
            }
        }

        return json_encode($photos);
    }
}
