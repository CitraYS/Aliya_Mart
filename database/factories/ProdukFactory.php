<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->words(2, true),
            'harga_produk' => fake()->numberBetween(5000, 100000),
            'harga_modal' => fake()->numberBetween(1000, 4000),
            'stok_produk' => fake()->numberBetween(1, 100),
            'barcode' => fake()->ean13(), // Menghasilkan kode barcode 13 digit
        ];
    }
}
