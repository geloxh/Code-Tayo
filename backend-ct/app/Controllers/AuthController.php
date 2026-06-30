<?php
class AuthController {
    private AuthService $auth;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->auth = new AuthService();
    }

    // ─── Show Login Page ─── //
    public function showLogin(): void {
        if ($this->auth->isLoggedIn()) {
            $this->redirect('/dashboard');
        }
        // Auto-login via remember me cookie
        if ($this->auth->checkRememberMe()) {
            $this->redirect('/dashboard');
        }
        require_once 'views/auth/login.php';
    }

    // ─── Handle Login ───
    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
            return;
        }

        // CSRF check
        if (!$this->verifyCsrf()) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid request.']);
            return;
        }

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $remember = isset($_POST['remember_me']);

        // Basic validation
        if (empty($email) || empty($password)) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'Email and password are required.'
            ]);
            return;
        }

        $result = $this->auth->login($email, $password);

        if ($result['success'] && $remember) {
            $this->auth->setRememberMe($result['user']['id']);
        }

        $this->jsonResponse($result);
    }

    // ─── Handle Register ──────────────────────────────────
    public function register(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once 'views/auth/register.php';
            return;
        }

        if (!$this->verifyCsrf()) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid request.']);
            return;
        }

        $data = [
            'name'             => trim($_POST['name'] ?? ''),
            'email'            => trim($_POST['email'] ?? ''),
            'password'         => $_POST['password'] ?? '',
            'confirm_password' => $_POST['confirm_password'] ?? '',
            'role'             => 'employee'
        ];

        $result = $this->auth->register($data);
        $this->jsonResponse($result);
    }

    // ─── Handle Logout ───
    public function logout(): void {
        $this->auth->logout();
        $this->redirect('/login');
    }

    // ─── Forgot Password ───
    public function forgotPassword(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once 'views/auth/forgot-password.php';
            return;
        }

        $email  = trim($_POST['email'] ?? '');
        $result = $this->auth->forgotPassword($email);
        $this->jsonResponse($result);
    }

    // ─── Reset Password ─── 
    public function resetPassword(): void {
        $token = $_GET['token'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once 'views/auth/reset-password.php';
            return;
        }

        $newPassword = $_POST['password'] ?? '';
        $result      = $this->auth->resetPassword($token, $newPassword);
        $this->jsonResponse($result);
    }

    // ─── Middleware: Require Login ───
    public function requireAuth(): void {
        if (!$this->auth->isLoggedIn()) {
            if (!$this->auth->checkRememberMe(