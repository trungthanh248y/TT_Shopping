<?php
namespace App\Contracts;
interface EventRepositoryInterface extends RepositoryInterface
{
    public function allEvent();
    public function findEvent($id);
    public function productEvent($id);
    public function allEventID($id);
    public function categoryEvent();
    public function parentEvent();
    public function findCategory($id);
    public function getStore($request);
    public function getUpdate($request, $id);
    public function getDelete($request);
}

