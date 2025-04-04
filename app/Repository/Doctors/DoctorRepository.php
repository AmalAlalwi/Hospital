<?php
namespace App\Repository\Doctors;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadFile;
    public function index()
    {
        $doctors = Doctor::all();
        return view('dashboard.doctors.index', compact('doctors'));
    }
    public function create(){
        $sections=Section::all();
        $appointments=Appointment::all();
        return view('dashboard.doctors.create', compact('sections','appointments'));
    }
    public function store($request)
    {
        DB::beginTransaction();
        try{
        $validator= Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:255',
            'appointments' => 'required',
            'price' => 'required|integer',
            'section_id' => 'required|integer|exists:sections,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $doctor = new Doctor();
        $doctor->email=$request->email;
        $doctor->password=Hash::make($request->password);
        $doctor->phone=$request->phone;
        $doctor->price=$request->price;
        $doctor->section_id=$request->section_id;
        $doctor->status=1;
        $doctor->save();
        $doctor->name=$request->name;
        $doctor->appointments=implode(',',$request->appointments);
        $doctor->save();
        $this->VerifyAndStoremage($request,'photo','dashboard\img\doctors',$doctor->id,'App\Models\Doctor');
        session()->flash('add');
        DB::commit();
        return redirect()->route('doctors.create');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

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
        if($request->page_id==1){

        }
        else {

        }
    }
}
