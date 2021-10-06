<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Core\View;

class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new User();
        $this->view = new View();
    }

    public function action_index()
    {
        if (isset($_COOKIE['auth'])) {
            $users = $this->model->getUsers();
            $currentUser = $this->model->getCurrentUser();
        } else {
            $users = [];
            $currentUser = [];
        }

        $this->view->generate('main.php', 'template_view.php', ['users' => $users, 'currentUser' => $currentUser] );
    }

}