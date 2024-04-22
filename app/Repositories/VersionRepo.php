<?php 
namespace App\Repositories;

use App\Models\VERSION;
use App\Models\EVENMENT;

class VersionRepo
{
    protected $model;
    function __construct(VERSION $model){
        $this->model = $model;
    }

    function getAll($params = null){
        $query = $this->model::query();
        $query->where('DATE', '>=', date('Y-m-d'));
        // if (!empty($params['endDate'])) {
        //     $query->where('DATE', '<=', $params['endDate']);
        // }
        return $this->model::select($query)->with('events');
    }
    
}
