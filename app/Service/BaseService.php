<?php


namespace App\Service;


interface BaseService
{

    public function list($array = null);

    public function create($array);

    public function get($id);

    public function update($array, $id);

    public function delete($id);
}
