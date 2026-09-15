<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_daftar_produk_dapat_dibuka(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_produk_dapat_ditambahkan(): void
    {
        $category = Category::create([
            'name' => 'Nasi Box',
            'description' => 'Kategori nasi box',
        ]);

        $response = $this->post('/products', [
            'category_id' => $category->id,
            'name' => 'Nasi Ayam Bakar',
            'description' => 'Menu ayam bakar',
            'price' => 25000,
            'is_available' => 1,
        ]);

        $response->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'name' => 'Nasi Ayam Bakar',
        ]);
    }

    public function test_produk_dapat_diperbarui(): void
    {
        $category = Category::create([
            'name' => 'Nasi Box',
            'description' => 'Kategori nasi box',
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Nasi Ayam',
            'description' => 'Menu awal',
            'price' => 20000,
            'is_available' => true,
        ]);

        $response = $this->put("/products/{$product->id}", [
            'category_id' => $category->id,
            'name' => 'Nasi Ayam Bakar',
            'description' => 'Menu diperbarui',
            'price' => 25000,
            'is_available' => 1,
        ]);

        $response->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Nasi Ayam Bakar',
        ]);
    }

    public function test_produk_dapat_dihapus(): void
    {
        $category = Category::create([
            'name' => 'Nasi Box',
            'description' => 'Kategori nasi box',
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Nasi Ayam',
            'description' => 'Menu',
            'price' => 20000,
            'is_available' => true,
        ]);

        $response = $this->delete("/products/{$product->id}");

        $response->assertRedirect('/products');

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
