<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use App\Models\Estimara;
use Illuminate\Http\Request;

class EstimaraController extends Controller
{
    public function step1() {
        $ateliers = Atelier::latest()->paginate(25);
        return view ('estimara.step1', compact('ateliers'));
    }
    public function thankyou() {
        return view ('estimara.thankyou');
    }

    public function post(Request $request) {
                $request->validate([
                    'name' => 'required',
                    'avatar' => 'required',
                    'birth' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'addr' => 'required',
                    'gender' => 'required'
                ]);

                if($request->file('avatar')->extension() !== 'png') {
                    if($request->file('avatar')->extension() !== 'jpg') {
                        return back()->withErrors('Please insert valid image format');
                    }
                }

                $data['name'] = $request->name; 
                $data['birth'] = $request->birth;
                $data['addr'] = $request->addr;
                $data['email'] = $request->email;
                $data['phone'] = $request->phone;
                $data['gender'] = $request->gender;
                $data['ateliers'] = json_encode( $request->ateliers);
                $data['hearing'] = $request->hearing;
                $data['why'] = $request->why;
                $data['enrolledBefore'] = $request->enrolledBefore;
                $data['yourGoal'] = $request->yourGoal;
                $data['avatar'] = img($request, 'avatar', 'avatar');

                $currentUserEmail = Estimara::where('email', $data['email'])->first();
                $currentUserPhone = Estimara::where('phone', $data['phone'])->first();
                if ($currentUserEmail || $currentUserPhone) return back()->withErrors('لقد تم تسجيل نفس المستخدم من قبل يرجى التأكد');
               
                // ajouter candidjson
                Estimara::create($data);

                return redirect()->route('estimara.thankyou')->withErrors('Data inserted');
    }
}
 