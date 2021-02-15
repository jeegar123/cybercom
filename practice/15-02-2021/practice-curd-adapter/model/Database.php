<?php


namespace models;

date_default_timezone_set('Asia/Kolkata');
interface Database
{

    public function insert($object);
    public function delete($id);
    public function update($object);
    public function getById($id);
    public function getAll();
}
