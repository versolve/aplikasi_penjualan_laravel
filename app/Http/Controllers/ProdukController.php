<?php
namespace App\Http\Controllers;
// Import Model produk
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
// Import return type View
use Illuminate\View\View;
class ProdukController extends Controller
{
    /**
     * Menampilkan data produk
     *
     * @return View
     */
    public function ViewProduk(): View
    {
        // Mengambil semua data produk
        $products = produk::latest()->paginate(10);

        // Menampilkan view produk
        return view('produk', compact('products'));
    }

    public function FormTambahProduk(): View
    {
        return view('produk_tambah');
    }

    public function FormEditProduk(int $id): View
    {
        $product = produk::findOrFail($id);

        return view('produk_edit', compact('product'));
    }

    public function UpdateProduk(Request $request, int $id): RedirectResponse
    {
        $product = produk::findOrFail($id);
        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'integer', 'min:0'],
            'jumlah_produk' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $storedPath = $request->file('image')->store('images', 'public');
            if ($storedPath === false) {
                throw new \RuntimeException('Gagal menyimpan gambar produk.');
            }

            $oldImage = $product->image;
            $validated['image'] = basename($storedPath);
            $product->update($validated);

            if ($oldImage !== null) {
                Storage::disk('public')->delete('images/' . $oldImage);
            }
        } else {
            $product->update($validated);
        }

        return redirect('/produk');
    }

    public function DeleteProduk(int $id): RedirectResponse
    {
        $product = produk::findOrFail($id);
        $imageName = $product->image;

        $product->delete();

        if ($imageName !== null) {
            Storage::disk('public')->delete('images/' . $imageName);
        }

        return redirect('/produk');
    }
    
    public function CreateProduk(Request $request)
    {
    //menambahkan variabel $filePath untuk mendefinisikan penyimpanan file
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        $storedPath = $imageFile->storeAs('images', $imageName, 'public');
        if ($storedPath === false) {
            throw new \RuntimeException('Gagal menyimpan gambar produk.');
        }
    }
    Produk::create([
        'kode_produk' => $request->kode_produk,
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'jumlah_produk' => $request->jumlah_produk,
        'image'       => $imageName

    ]);
    return redirect('/produk');
}
}
