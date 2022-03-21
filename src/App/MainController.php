<?php

namespace App;

use App\Kelas\Model\Kelas;
use App\MAHASISWA\Model\Mahasiswa;
use App\Matakuliah\Model\Matakuliah;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        return render_template('welcome', []);
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('home/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
