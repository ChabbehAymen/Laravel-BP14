<?php

namespace App\Repositories\contrats;
interface RepositoriesInterface
{
    function get();
    function create(array $data);
    function update($id ,array $data);
    function find(int $id);

}
