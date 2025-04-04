<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $sectionRepository;

    public function __construct(SectionRepositoryInterface $sectionRepository) {
        $this->sectionRepository = $sectionRepository;
    }

    public function index()
    {
       return $this->sectionRepository->index();
    }
    public function store(Request $request)
    {
        return $this->sectionRepository->store($request);
    }
    public function update(Request $request)
    {
        return $this->sectionRepository->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->sectionRepository->destroy($request);
    }
}
