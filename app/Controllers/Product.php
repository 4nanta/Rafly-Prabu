<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Product extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        helper(['form', 'url']);
    }

    // 1. TAMPIL DATA (Read)
    public function index()
    {
        $data = [
            'products' => $this->productModel->findAll()
        ];
        return view('product/index', $data);
    }

    // 2. FORM TAMBAH DATA
    public function create()
    {
        session(); // Untuk menangkap pesan error validasi
        return view('product/create', ['validation' => \Config\Services::validation()]);
    }

    // 3. PROSES SIMPAN DATA (Create + Validasi Upload)
    public function save()
    {
        // VALIDASI ATURAN (Sesuai Syarat Dosen: .jpg dan .png saja)
        if (!$this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2048]|ext_in[image,jpg,png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'ext_in'   => 'Format file wajib .jpg atau .png!'
                ]
            ]
        ])) {
            return redirect()->to('/product/create')->withInput();
        }

        // Ambil file gambar
        $fileImage = $this->request->getFile('image');
        
        // Generate nama file acak agar tidak bentrok di server
        $newFileName = $fileImage->getRandomName();

        // Pindahkan file ke public/assets/img/upload/
        $fileImage->move('assets/img/upload', $newFileName);

        // Simpan ke database
        $this->productModel->save([
            'title'       => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'image'       => $newFileName
        ]);

        return redirect()->to('/product')->with('success', 'Data berhasil ditambahkan!');
    }

    // 4. PROSES HAPUS DATA (Delete + Hapus File di Server)
    public function delete($id)
    {
        $product = $this->productModel->find($id);

        // Hapus file fisik gambar di server lokal jika ada
        if (file_exists('assets/img/upload/' . $product['image'])) {
            unlink('assets/img/upload/' . $product['image']);
        }

        $this->productModel->delete($id);
        return redirect()->to('/product')->with('success', 'Data berhasil dihapus!');
    }
}