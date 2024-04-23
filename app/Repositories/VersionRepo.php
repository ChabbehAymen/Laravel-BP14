<?php
namespace App\Repositories;

use App\Models\Billet;
use App\Models\Version;

class VersionRepo extends BaseRepository
{
    function __construct(Version $model){
        parent::__construct($model);
    }

    function getAll($params = null){
        $query = Billet::query()
            ->select('versions.id', 'title', 'start_date', 'category', 'image', 'capacity')
            ->join('factures', 'facture_id', '=', 'factures.id')
            ->rightJoin('versions', 'version_id', '=', 'versions.id')
            ->join('events', 'event_id', '=', 'events.id')
            ->join('salles', 'salle_id' , '=', 'salles.id')
            ->groupBy('title','versions.id', 'start_date', 'category', 'image', 'capacity');

        $query->where('start_date', '>=', date('Y-m-d'));
//        var_dump($query->get()[0]['start_date']);
         if (!empty($params['endDate'])) {
             $query->where('end_date', '<=', $params['endDate']);
         }elseif (!empty($params['category'])){
             $query->where('category', '<=', $params['endDate']);
         }
         $query->addSelect([
             'available' => $this->model->query()
                 ->raw('capacity - COUNT(billets.id) AS available')

         ]);
        return $query->get();
    }

}
