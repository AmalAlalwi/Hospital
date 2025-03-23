<?php
namespace App\Repository\Sections;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
public function index()
{
    $sections = Section::all();
  return view('dashboard.sections.index', compact('sections'));
}
}
