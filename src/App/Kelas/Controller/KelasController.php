<?php

namespace App\Kelas\Controller;

use App\Kelas\Model\Kelas;
use App\MAHASISWA\Model\Mahasiswa;
use App\Matakuliah\Model\Matakuliah;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KelasController
{
  public $crud_kelas;
  public $crud_mahasiswa;
  public $crud_matakuliah;



  public function __construct()
  {
    // memanggil model Kelas
    $this->crud_kelas = new Kelas;
    $this->crud_mahasiswa = new Mahasiswa;
    $this->crud_matakuliah = new Matakuliah;
  }

  public function index(Request $request)
  {
    $crud_kelas = $this->crud_kelas
      //cara left join sebelah kiri tabel luar yg mau di gabungkan yg kanan tabel induknya 
      ->leftJoin('tb_matakuliah', 'tb_matakuliah.id', '=', 'tb_kelas.id_matakuliah')
      ->leftJoin('tb_mahasiswa', 'tb_mahasiswa.id', '=', 'tb_kelas.id_mahasiswa')
      ->get();
    return render_template('content/kelas/index', ['crud_kelas' => $crud_kelas]);
  }
  public function create(Request $request)
  {
    $crud_matakuliah = $this->crud_matakuliah->get();
    $crud_mahasiswa = $this->crud_mahasiswa->get();
    return render_template('content/kelas/create', ['crud_mahasiswa' => $crud_mahasiswa, 'crud_matakuliah' => $crud_matakuliah]);
  }

  public function store(Request $request)
  {
    //ini merupakan cara menangkap data dari metode post
    $nama = $request->request->get('nama');
    $matakuliah[] = $request->request->get('mk');

    $datas = $request->request->all();
    foreach ($datas['mk'] as $key => $value) {
      $this->crud_kelas->insert([
        'id_mahasiswa' => $nama,
        'id_matakuliah' => $datas['mk'][$key]
      ]);
    }
    return new RedirectResponse('/kelas');
  }

  public function show(Request $request)
  {
    $id = $request->attributes->get('id');
    $crud_kelas = $this->crud_kelas
      ->leftJoin('tb_matakuliah', 'tb_matakuliah.id', '=', 'tb_kelas.id_matakuliah')
      ->leftJoin('tb_mahasiswa', 'tb_mahasiswa.id', '=', 'tb_kelas.id_mahasiswa')
      ->where('id_mahasiswa', $id)->first();
    return render_template('content/kelas/show', ['crud_kelas' => $crud_kelas]);
  }

  public function edit(Request $request)
  {
    $crud_matakuliah = $this->crud_matakuliah->get();
    $crud_mahasiswa = $this->crud_mahasiswa->get();

    $id = $request->attributes->get('id');
    $crud_kelas = $this->crud_kelas->where('id_mahasiswa', $id)->first();

    $mahasiswa = $this->crud_mahasiswa
      ->where('id', $id)
      ->first();

    $matakuliah = $this->crud_kelas->where('id_mahasiswa', $id)->get();

    $ar_matkul = [];

    foreach ($matakuliah->items as $key => $value) {
      array_push($ar_matkul, $value['id_matakuliah']);
    }

    dd($ar_matkul);

    return render_template('content/kelas/edit', ['crud_kelas' => $crud_kelas, 'crud_matakuliah' => $crud_matakuliah, 'crud_mahasiswa' => $crud_mahasiswa, 'mahasiswa' => $mahasiswa, 'matakuliah' => $matakuliah, 'ar_matkul' => $ar_matkul]);
  }

  public function update(Request $request)
  {
    $id = $request->attributes->get('id');
    $datas = $request->request->all();
    dd($datas['mk']);

    foreach ($datas['mk'] as $key => $value) {
      $this->crud_kelas
        ->where('id_mahasiswa', $id)
        ->update([
          'id_matakuliah' => $value
        ]);
    };


    return new RedirectResponse('/kelas');
  }

  public function delete(Request $request)
  {
    $id = $request->attributes->get('id');

    $this->crud_kelas->where('id_kelas', $id)->delete();

    return new RedirectResponse('/kelas');
  }
}
