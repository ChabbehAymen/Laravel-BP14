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
        $this->model = new EventsModel();
        $data = $this->model->getAllEvents(date('Y-m-d'));
        return view('home')->with('data',$data);
    }
}
