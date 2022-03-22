<?php

namespace App\Dosen\Controller;

use App\Dosen\Model\Dosen;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DosenController
{
  public $crud_dosen;

  public function __construct()
  {
    // memanggil model Matakuliah
    $this->crud_dosen = new Dosen;
  }

  public function index(Request $request)
  {
    $crud_dosen = $this->crud_dosen->get();
    return render_template('content/dosen/index', ['crud_dosen' => $crud_dosen]);
  }
  public function create(Request $request)
  {
    return render_template('content/dosen/create', []);
  }

  public function store(Request $request)
  {
    //ini merupakan cara menangkap data dari metode post
    $nid = $request->request->get('nid');
    $nama_dosen = $request->request->get('nama_dosen');


    $this->crud_dosen->insert([
      'nid' => $nid,
      'nama_dosen' => $nama_dosen
    ]);
    return new RedirectResponse('/dosen');
  }

  public function show(Request $request)
  {
    $id = $request->attributes->get('id');
    $crud_dosen = $this->crud_dosen->where('id', $id)->first();
    return render_template('content/dosen/show', ['crud_dosen' => $crud_dosen]);
  }

  public function edit(Request $request)
  {
    $id = $request->attributes->get('id');
    $crud_dosen = $this->crud_dosen->where('id', $id)->first();
    return render_template('content/dosen/edit', ['crud_dosen' => $crud_dosen]);
  }

  public function update(Request $request)
  {
    $id = $request->attributes->get('id');
    $this->crud_dosen->where('id', $id)->update([
      'nid' => $request->request->get('nid'),
      'nama_dosen' => $request->request->get('nama_dosen')
    ]);
    return new RedirectResponse('/dosen');
  }

  public function delete(Request $request)
  {
    $id = $request->attributes->get('id');

    $this->crud_dosen->where('id', $id)->delete();

    return new RedirectResponse('/dosen');
  }
}
