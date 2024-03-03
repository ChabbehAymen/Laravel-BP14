<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class EventsModel
{
    public function getAllEvents(string $startDate, string $endDate = null, string $category = 'all'): array
    {
        $q  ="SELECT ID_VERSION, TITRE , DATE , CATEGORIE , IMAGE , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) GROUP BY TITRE, ID_VERSION, DATE, CATEGORIE, IMAGE, CAPACITE HAVING DATE >= '$startDate'";
        if ($endDate != null) {
            $q .= " and DATE <= '$endDate'";
        }
        if ($category != 'all') {
            $q .= " and CATEGORIE = '$category'";
        }
        return DB::select($q);
    }

}
