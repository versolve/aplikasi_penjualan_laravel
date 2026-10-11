<?php

namespace Tests\Feature;

use App\Models\produk;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProdukTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_product_page_is_accessible_with_get(): void
    {
        $this->get('/produk/tambah')
            ->assertOk()
            ->assertSee('Tambah Produk')
            ->assertSee('method="POST"', false);
    }

    public function test_product_can_be_created_with_post(): void
    {
        $this->post('/produk/tambah', [
            'nama_produk' => 'Produk Uji',
            'deskripsi' => 'Deskripsi produk uji',
            'harga' => 15000,
            'jumlah_produk' => 5,
        ])->assertRedirect('/produk');

        $this->assertDatabaseHas('produks', [
            'nama_produk' => 'Produk Uji',
            'harga' => 15000,
            'jumlah_produk' => 5,
        ]);
    }

    public function test_uploaded_product_image_is_stored_on_the_public_disk(): void
    {
        Storage::fake('public');

        $this->post('/produk/tambah', [
            'nama_produk' => 'Produk Bergambar',
            'harga' => 20000,
            'jumlah_produk' => 1,
            'image' => UploadedFile::fake()->image('produk.png'),
        ])->assertRedirect('/produk');

        $product = produk::where('nama_produk', 'Produk Bergambar')->firstOrFail();

        Storage::disk('public')->assertExists('images/' . $product->image);
    }

    public function test_product_can_be_edited(): void
    {
        $product = produk::create([
            'nama_produk' => 'Produk Lama',
            'harga' => 20000,
            'jumlah_produk' => 1,
        ]);

        $this->get('/produk/edit/' . $product->kode_produk)
            ->assertOk()
            ->assertSee('Edit Produk');

        $this->put('/produk/edit/' . $product->kode_produk, [
            'nama_produk' => 'Produk Baru',
            'deskripsi' => 'Deskripsi diperbarui',
            'harga' => 25000,
            'jumlah_produk' => 3,
        ])->assertRedirect('/produk');

        $this->assertDatabaseHas('produks', [
            'kode_produk' => $product->kode_produk,
            'nama_produk' => 'Produk Baru',
            'harga' => 25000,
            'jumlah_produk' => 3,
        ]);
    }

    public function test_editing_unknown_product_returns_not_found(): void
    {
        $this->get('/produk/edit/999999')->assertNotFound();
    }

    public function test_product_can_be_deleted(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('images/produk.png', 'image contents');

        $product = produk::create([
            'nama_produk' => 'Produk Hapus',
            'harga' => 20000,
            'jumlah_produk' => 1,
            'image' => 'produk.png',
        ]);

        $this->delete('/produk/delete/' . $product->kode_produk)
            ->assertRedirect('/produk');

        $this->assertDatabaseMissing('produks', [
            'kode_produk' => $product->kode_produk,
        ]);
        Storage::disk('public')->assertMissing('images/produk.png');
    }

    public function test_deleting_unknown_product_returns_not_found(): void
    {
        $this->delete('/produk/delete/999999')->assertNotFound();
    }
}
