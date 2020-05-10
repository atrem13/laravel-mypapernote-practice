<?php

namespace App\Http\Controllers;
use App\Avatar;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    // show form
    public function index() {
        return view('avatar.index');
    }

    // file upload
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required'
        ],
        [
            'files.required' => 'pilih file'
        ]);
        if(!$validator->fails()){
            $total_files = count($request->file('files'));
            foreach ($request->file('files') as $file) {
                // rename & upload files to uploads folder
                $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
                $path = public_path() . '/avatar/uploads';
                $file->move($path, $name);

                // store in db
                $fileUpload = new Avatar();
                $fileUpload->filename = $name;
                $fileUpload->save();
            }
            return redirect('/avatar/create')->with("success", $total_files . " files uploaded successfully");
        }else{
            return redirect('/avatar/create')->with("success", " files uploaded Failed");
        }


    }
}
