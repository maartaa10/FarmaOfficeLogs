<?php
namespace App\Repositories\Interfaces;

interface MetricRepositoryInterface

{
    public function store(array $data);
    public function findById($id);
    public function delete($id);
    public function findAll(); 
    public function update($id, array $data);
    public function findByFilters(array $filters);
}


