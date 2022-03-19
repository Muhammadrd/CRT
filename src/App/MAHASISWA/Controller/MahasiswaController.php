<?php

namespace App\MAHASISWA\Controller;

use App\MAHASISWA\Model\Mahasiswa;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class MahasiswaController
{

  public $crud_mahasiswa;

  public function __construct()
  {
    // new mahasiswa ini merupakan model yg di panggil
    $this->crud_mahasiswa = new Mahasiswa;
  }

  public function index(Request $request)
  {
    $crud_mahasiswa = $this->crud_mahasiswa->get();

    return render_template('content/view/index', ['crud_mahasiswa' => $crud_mahasiswa]);
  }

  public function create(Request $request)
  {
    return render_template('content/view/create', []);
  }

  public function store(Request $request)
  {
    //ini merupakan cara menangkap data dari metode post
    $nama = $request->request->get('nama');
    $kelas = $request->request->get('kelas');
    $jurusan = $request->request->get('jurusan');


    $this->crud_mahasiswa->insert([
      'nama' => $nama,
      'kelas' => $kelas,
      'jurusan' => $jurusan
    ]);
    return new RedirectResponse('/crud');
  }

  public function show(Request $request)
  {
    $id = $request->attributes->get('id');
    $crud_mahasiswa = $this->crud_mahasiswa->where('id', $id)->first();
    return render_template('content/view/show', ['crud_mahasiswa' => $crud_mahasiswa]);
  }

  public function edit(Request $request)
  {
    $id = $request->attributes->get('id');
    $crud_mahasiswa = $this->crud_mahasiswa->where('id', $id)->first();
    return render_template('content/view/edit', ['crud_mahasiswa' => $crud_mahasiswa]);
  }

  public function update(Request $request)
  {
    $id = $request->attributes->get('id');
    $this->crud_mahasiswa->where('id', $id)->update([
      'nama' => $request->request->get('nama'),
      'kelas' => $request->request->get('kelas'),
      'jurusan' => $request->request->get('jurusan')
    ]);
    return new RedirectResponse('/crud');
  }

  public function delete(Request $request)
  {
    $id = $request->attributes->get('id');

    $this->crud_mahasiswa->where('id', $id)->delete();

    return new RedirectResponse('/crud');
  }
}
