<?php

namespace App\Http\Controllers;

use App\Models\EventsModel;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private EventsModel $model;

    public function index(): view
    {
        $endDate = null;
        $category = 'all';
        $this->model = new EventsModel();
        if (isset($_POST['filter'])) {
            if (isset($_POST['endDate'])) $endDate = $_POST['endDate'];
            if (isset($_POST['category'])) $category = $_POST['category'];
        }
        $data = $this->model->getAllEvents(date('Y-m-d'), $endDate, $category);

        return view('home')->with('data', $data);
    }
}
