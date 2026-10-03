<?php
namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'username'  => 'required|is_unique[users.username]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new UserModel();
        $model->insert([
            'full_name' => $this->request->getPost('full_name'),
            'username'  => $this->request->getPost('username')
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required',
            'username'  => "required|is_unique[users.username,id,{$id}]",
        ];

        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid()) {
            $rules['avatar'] = 'uploaded[avatar]|max_size[avatar,2048]|ext_in[avatar,png,jpg,jpeg]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new UserModel();
        $updateData = [
            'full_name' => $this->request->getPost('full_name'),
            'username'  => $this->request->getPost('username')
        ];

        // Handle Image Upload and Preparation
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $file->move($uploadPath, $newName);

            $image = service('image');
            $image->withFile($uploadPath . '/' . $newName)
                  ->fit(300, 300, 'center')
                  ->save($uploadPath . '/' . $newName);

            $updateData['avatar'] = $newName;
        }

        $model->update($id, $updateData);
        return redirect()->to('/users');
    }
}