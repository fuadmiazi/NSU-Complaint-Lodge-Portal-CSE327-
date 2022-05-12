<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Mail\ConfirmationMail;
use App\Mail\ReviewerMail;
use App\Mail\CriminalMail;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MasterController extends Controller
{
    public function index()
    {
        //$complaint = complaint::all();
        $userType = Auth::user()->userType;
        $name = Auth::user()->name;

        if($userType=='Admin')
        {
            $complaint = complaint::all();
            return view('admin',compact('complaint'));
        }
        else
        {
            //$user = user::all();
            return view('dashboard');
        }
    }

    public function lodgeComplaints(Request $request)
    {
        //$complaint = complaint::all();

        $complaineeName = Auth::user()->name;
        $complaineeEmail = Auth::user()->email;

        $data = new complaint;

        $image=$request->file;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->file->move('evidenceFile',$imagename);

        $data->evidence = $imagename;

        $data->yourNmae = $complaineeName;
        //$data->yourNmae = $request->name;
        $data->criminal = $request->criminal;
        $data->description = $request->description;
        $data->reviewer = $request->reviewer;

        $data->save();

        $reviewerInfo = user::where('name',$data->reviewer)->get('email');

        $criminalInfo = user::where('name',$data->criminal)->get('email');

        //$reviewerEmail = $reviewerInfo->email;

        $details = [
            'title' => 'Your complaint has been lodged successfully!',

            'body' => "Dear " .$complaineeName. " you have lodged complained against " .$data->criminal. " and you have chosen " .$data->reviewer. " to solve the case."
        ];

        $details2 =[
            'title' => 'Someone Lodged A Complaint!',

            'body'=> "Dear ".$data->reviewer.", you have been chosen as a reviewer to solve a case and the complain was lodged by: ".$complaineeName." against: ".$data->criminal."."
        ];

        $details3 = [
            'title' => 'You Have Been Sued!',

            'body'=> "Dear ".$data->criminal." we are very sorry to let you know that ".$complaineeName." has lodged a complaint against you.".$data->reviewer." will review the case."
        ];


        Mail::to($complaineeEmail)->send(new ConfirmationMail($details));

        Mail::to($reviewerInfo)->send(new ReviewerMail($details2));

        Mail::to($criminalInfo)->send(new ReviewerMail($details3));
        



        return redirect()->back()->with('message','Lodged The Complaint Successfully');

    }

    public function updateStatus($id)
    {
        $complaint = complaint::find($id);

        $complaint->status="Closed";

        $complaint->save();

        return redirect()->back();
    }

    

    public function myComplaints()
    {
        $user = auth()->user();

        $complaint = complaint::where('yourNmae',$user->name)->get();

        // $complaint = complaint::all();
            return view('mycomplaints',compact('complaint'));
    }

    public function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = User::select('name')
                        ->where('name', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    }




    
}
