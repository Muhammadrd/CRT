## Fri Feb 04 2022

Refactoring Internal Urban Access Apps

- Menu Data Minat

  - [✔] Index
  - [✔] Create
  - [✔] Store
  - [✔] Detail
  - [✔] Edit
  - [✔] Update
  - [✔] Edit

- List Minat Per Status

  - [✔] Index

  <br><br>

Last Progress:

- [-] Dokumentasi Input Hasil Soft Survey

Note :

- Judul Tabel Harus Diperbaiki

#### Store Media

```php
$this->media
    ->storeMedia($request->files->get('file_name'), [
        'id_relation' => $create,
        'jenis_dokumen' => 'file-name',
    ]);
```

#### Update Media

```php
$this->media
    ->updateMedia($request->files->get('file_name'), [
        'id_relation' => $id,
        'jenis_dokumen' => 'file-name',
    ], $this->model, $id);

```
