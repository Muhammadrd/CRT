<?php

namespace App\Matakuliah\Controller;


use App\Matakuliah\Model\Matakuliah;
use App\Dosen\Model\Dosen;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class MatakuliahController
{
  public $crud_matakuliah;
  public $crud_dosen;

  public function __construct()
  {
    // memanggil model Matakuliah
    $this->crud_matakuliah = new Matakuliah;
    $this->crud_dosen = new Dosen;
  }

  public function index(Request $request)
  {
    $crud_matakuliah = $this->crud_matakuliah
      ->leftJoin('tb_dosen', 'tb_dosen.id', '=', 'tb_matakuliah.id_dosen')
      ->get();
    return render_template('content/matakuliah/index', ['crud_matakuliah' => $crud_matakuliah]);
  }
  public function create(Request $request)
  {
    $crud_matakuliah = $this->crud_matakuliah->get();
    $crud_dosen = $this->crud_dosen->get();
    return render_template('content/matakuliah/create', ['crud_matakuliah' => $crud_matakuliah, 'crud_dosen' => $crud_dosen]);
  }

  public function store(Request $request)
  {
    //ini merupakan cara menangkap data dari metode post
    $matakuliah = $request->request->get('matakuliah');
    $sks = $request->request->get('sks');
    $dosen = $request->request->get('dosen');


    $this->crud_matakuliah->insert([
      'mata_kuliah' => $matakuliah,
      'sks' => $sks,
      'dosen' => $dosen
    ]);
    return new RedirectResponse('/matakuliah');
  }

  public function show(Request $request)
  {
    $crud_dosen = $this->crud_dosen->get();
    $id = $request->attributes->get('id');
    $crud_matakuliah = $this->crud_matakuliah
      ->leftJoin('tb_dosen', 'tb_dosen.id', '=', 'tb_matakuliah.id_dosen')
      ->where('id_dosen', $id)->first();

    // dd($crud_matakuliah);


    return render_template('content/matakuliah/show', ['crud_matakuliah' => $crud_matakuliah, 'crud_dosen' => $crud_dosen]);
  }

  public function edit(Request $request)
  {
    $id = $request->attributes->get('id');
    $crud_matakuliah = $this->crud_matakuliah->where('id', $id)->first();
    return render_template('content/matakuliah/edit', ['crud_matakuliah' => $crud_matakuliah]);
  }

  public function update(Request $request)
  {
    $id = $request->attributes->get('id');
    $this->crud_matakuliah->where('id', $id)->update([
      'mata_kuliah' => $request->request->get('mata_kuliah'),
      'sks' => $request->request->get('sks'),
      'dosen' => $request->request->get('dosen')
    ]);
    return new RedirectResponse('/matakuliah');
  }

  public function delete(Request $request)
  {
    $id = $request->attributes->get('id');

    $this->crud_matakuliah->where('id', $id)->delete();

    return new RedirectResponse('/matakuliah');
  }
}
