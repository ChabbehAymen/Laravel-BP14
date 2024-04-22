<?php

namespace App\Http\Controllers;

use App\Repositories\VersionRepo;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $repo;

    public function __construct(VersionRepo $versionRepo){
        $this->repo = $versionRepo;
    }

    public function index(): view
    {
        $endDate = null;
        $category = 'all';
        if (isset($_POST['filter'])) {
            if (isset($_POST['endDate'])) $endDate = $_POST['endDate'];
            if (isset($_POST['category'])) $category = $_POST['category'];
        }
        $data = $this->repo->getAll();

        return view('home')->with('data', $data);
    }
}
