<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // If already logged in, send them to the dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/customers');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        // Check if user exists AND the typed password matches the hashed password
        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'logged_in' => true,
                'user_id'   => $user['id'],
                'username'  => $user['username']
            ]);
            
            // Regenerate session ID for security
            session()->regenerate();
            
            return redirect()->to('/customers'); // Or wherever your main page is
        }

        // If it fails, send them back with an error
        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}