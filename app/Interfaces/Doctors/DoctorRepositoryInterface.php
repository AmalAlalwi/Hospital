<?php
namespace App\Interfaces\Doctors;
interface DoctorRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
