<?php
class HomeController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function index()
    {
        $users = $this->userModel->getAll();
        require '../app/views/home.php';
    }
}
