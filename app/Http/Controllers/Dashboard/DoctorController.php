<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $doctorRepository;
    public function __construct(DoctorRepositoryInterface $doctorRepository){
        $this->doctorRepository = $doctorRepository;
    }
    public function index()
    {
        return $this->doctorRepository->index();
    }
    public function create(){
        return $this->doctorRepository->create();
    }

    public function store(Request $request)
    {
        return $this->doctorRepository->store($request);
    }


    public function update(Request $request)
    {
        return $this->doctorRepository->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->doctorRepository->destroy($request);
    }
}
