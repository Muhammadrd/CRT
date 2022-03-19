<?php

namespace App\CRUD\Controller;

use App\CRUD\Model\CRUD;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CRUDController
{
    public $crud;

    public function __construct()
    {
        $this->crud = new CRUD();
    }

    public function index(Request $request)
    {
        $crud = $this->crud->get();

        return render_template('content/crud/index', ['crud' => $crud]);
    }

    public function create(Request $request)
    {
        return render_template('content/crud/create', []);
    }

    public function store(Request $request)
    {
        $name = $request->request->get('name');
        $age = $request->request->get('age');
        $address = $request->request->get('address');

        $this->crud->insert([
            'name' => $name,
            'age' => $age,
            'address' => $address
        ]);

        return new RedirectResponse('/crud');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');


        $crud = $this->crud->where('id', $id)->first();

        return render_template('content/crud/edit', ['datas' => $crud]);
    }

    public function update(Request $request)
    {
        // mengambil data dengan metode get
        $id = $request->attributes->get('id');

        // mengambil data dari form dengan metode post
        $this->crud->where('id', $id)->update([
            'name' => $request->request->get('name'),
            'age' => $request->request->get('age'),
            'address' => $request->request->get('address')
        ]);
        // fungsi untuk nge redirect
        return new RedirectResponse('/crud');
    }

    public function show(Request $request)
    {
        $id = $request->attributes->get('id');

        $crud = $this->crud->where('id', $id)->first();

        return render_template('content/crud/show', ['crud' => $crud]);
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');

        $this->crud->where('id', $id)->delete();

        return new RedirectResponse('/crud');
    }
}
