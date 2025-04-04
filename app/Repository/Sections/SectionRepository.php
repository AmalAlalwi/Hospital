<?php
namespace App\Repository\Sections;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use http\Env\Request;
use Illuminate\Support\Facades\Validator;

class SectionRepository implements SectionRepositoryInterface
{
public function index()
{
    $sections = Section::all();
  return view('dashboard.sections.index', compact('sections'));
}
public function store($request)
{

    $validator= Validator::make($request->all(), [
       'name' => 'required|string|max:255',
    ]);
    Section::create($validator->validated());
    session()->flash('add');
    return redirect()->route('sections.index');
}
public function update($request){
    $validator= Validator::make($request->all(), [
        'name' => 'required|string|max:255',
    ]);
    $section=Section::findOrFail($request->id);
    $section->update($validator->validated());
    session()->flash('update');
    return redirect()->route('sections.index');
}
public function destroy($request){
$section=Section::findOrFail($request->id);
$section->delete();
session()->flash('delete');
return redirect()->route('sections.index');
}
}
