<?php namespace App\Controllers;

class Customers extends BaseController {
    public function index() {
        $data['customers'] = [
            ['name' => 'Alice Smith', 'email' => 'alice@example.com', 'phone' => '555-0101'],
            ['name' => 'Bob Jones', 'email' => 'bob@example.com', 'phone' => '555-0102'],
            ['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'phone' => '555-0103'],
            ['name' => 'Diana Prince', 'email' => 'diana@example.com', 'phone' => '555-0104'],
            ['name' => 'Evan Wright', 'email' => 'evan@example.com', 'phone' => '555-0105']
        ];
        return view('customers', $data);
    }
}