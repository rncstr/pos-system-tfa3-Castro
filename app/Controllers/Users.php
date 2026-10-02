<?php namespace App\Controllers;

class Users extends BaseController {
    public function index() {
        $data['users'] = [
            ['username' => 'admin_walastik', 'name' => 'John Doe', 'role' => 'Manager'],
            ['username' => 'cash_kung', 'name' => 'Jane Smith', 'role' => 'Cashier'],
            ['username' => 'stock_pumitik', 'name' => 'Mark Lee', 'role' => 'Stock Clerk'],
            ['username' => 'admin_sarah', 'name' => 'Sarah Connor', 'role' => 'Admin'],
            ['username' => 'cash_batungbakal', 'name' => 'Tom Hardy', 'role' => 'Cashier']
        ];
        return view('users', $data);
    }
}