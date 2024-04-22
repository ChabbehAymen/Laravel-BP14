<?php
namespace App\Repositories;

use App\Models\Version;

class VersionRepo
{
    protected $model;
    function __construct(Version $model){
        $this->model = $model;
    }

    function getAll($params = null){
        $query = $this->model::query()->join('salles', 'salle_id' , '=', 'salles.id')->join('events', 'event_id', '=', 'events.id');
        $query->where('start_date', '>=', date('Y-m-d'));
//        var_dump($query->get()[0]['start_date']);
         if (!empty($params['endDate'])) {
             $query->where('end_date', '<=', $params['endDate']);
         }elseif (!empty($params['category'])){
             $query->where('category', '<=', $params['endDate']);
         }
//         $query->addSelect(['available' => ]);
        return $query->get();
    }

}
