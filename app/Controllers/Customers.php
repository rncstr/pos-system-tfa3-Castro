<?php
namespace App\Controllers;
use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new CustomerModel();
        $model->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $model = new CustomerModel();
        $data['customer'] = $model->find($id);
        return view('customers/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new CustomerModel();
        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ]);

        return redirect()->to('/customers');
    }
}