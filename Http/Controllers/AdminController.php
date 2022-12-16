<?php

namespace App\Http\Controllers;
use App\Models\sms;

use App\Models\maps;
use App\Models\wifi;
use App\Models\websites;
use App\Models\phonenumbers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function Add_Web_Link(){
        $data2 = websites::all();
        return view('admin.web_link',['data2'=>$data2]);
    }

    public function Add_Map(){
        $data2 = maps::all();
        return view('admin.map',['data2'=>$data2]);
    }

    public function Add_Phone(){
        $data2 = phonenumbers::all();
        return view('admin.phone',['data2'=>$data2]);
    }

    public function Add_SMS(){
        $data2 = sms::all();
        return view('admin.sms',['data2'=>$data2]);
    }

    public function Add_WIFI(){
        $data2 = wifi::all();
        return view('admin.wifi',['data2'=>$data2]);
    }

    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function Web_Link(Request $req){
        $web = new websites();
        $web->link=$req->website_link;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->generate($req->website_link));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->generate($req->website_link));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->generate($req->website_link));
        $web->qrcode_png=$qrcode_png;
        $web->qrcode_eps=$qrcode_eps;
        $web->qrcode_svg=$qrcode_svg;
        $web->save();
        Alert::Success('Qrcode created','Successfully !');
        return back();
    }


    public function Map(Request $req){
        $maps = new maps();
        $maps->longitude=$req->longitude;
        $maps->latitude=$req->latitude;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->geo($req->longitude,$req->latitude));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->geo($req->longitude,$req->latitude));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->geo($req->longitude,$req->latitude));
        $maps->qrcode_png=$qrcode_png;
        $maps->qrcode_eps=$qrcode_eps;
        $maps->qrcode_svg=$qrcode_svg;
        $maps->save();
        Alert::Success('Qrcode created','Successfully !');
        return back();
    }

    public function Phone(Request $req){
        $phone = new phonenumbers();
        $phone->phone=$req->phone;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->phoneNumber($req->phone));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->phoneNumber($req->phone));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->phoneNumber($req->phone));
        $phone->qrcode_png=$qrcode_png;
        $phone->qrcode_eps=$qrcode_eps;
        $phone->qrcode_svg=$qrcode_svg;
        $phone->save();
        Alert::Success('Qrcode created','Successfully !');
        return back();
    }

    public function SMS(Request $req){
        $sms = new sms();
        $sms->sms=$req->sms;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->SMS($req->sms));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->SMS($req->sms));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->SMS($req->sms));
        $sms->qrcode_png=$qrcode_png;
        $sms->qrcode_eps=$qrcode_eps;
        $sms->qrcode_svg=$qrcode_svg;
        $sms->save();
        Alert::Success('Qrcode created','Successfully !');
        return back();
    }

    public function WIFI(Request $req){
        $wifi = new wifi();
        $wifi->encryption=$req->encryption;
        $wifi->title=$req->title;
        $wifi->password=$req->password;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->wiFi([
            'encryption' => $req->encryption,
            'ssid' => $req->title,
            'password' => $req->password,

        ]));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->wiFi([
            'encryption' => $req->encryption,
            'ssid' => $req->title,
            'password' => $req->password,

        ]));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->wiFi([
            'encryption' => $req->encryption,
            'ssid' => $req->title,
            'password' => $req->password,

        ]));
        $wifi->qrcode_png=$qrcode_png;
        $wifi->qrcode_eps=$qrcode_eps;
        $wifi->qrcode_svg=$qrcode_svg;
        $wifi->save();
        Alert::Success('Qrcode created','Successfully !');
        return back();
    }

    //--------------------------------------------------------------EDIT EDIT EDIT EDIT EDIT EDIT EDIT EDIT EDIT ---------------------------------------------------------
    public function Edit_website_link($id){
        $data = websites::WHERE('id',$id)->get();
        return view('admin.edit_web_link',['data'=>$data]);
    }

    public function Edit_website_link_Confirm(Request $req,$id){
        $data = websites::find($id);
        $data->link=$req->edit_web_link;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->generate($req->edit_web_link));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->generate($req->edit_web_link));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->generate($req->edit_web_link));
        $data->qrcode_png=$qrcode_png;
        $data->qrcode_eps=$qrcode_eps;
        $data->qrcode_svg=$qrcode_svg;
        $data->save();
        Alert::Success('Qrcode Edited','Successfully !');
        return redirect('Add_Web_Link');
    }


    public function Edit_Map($id){
        $data = maps::WHERE('id',$id)->get();
        return view('admin.edit_map',['data'=>$data]);
    }

    public function Edit_Map_Confirm(Request $req,$id){
        $data = maps::find($id);
        $data->longitude=$req->edit_longitude;
        $data->latitude=$req->edit_latitude;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->geo($req->edit_longitude,$req->edit_latitude));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->geo($req->edit_longitude,$req->edit_latitude));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->geo($req->edit_longitude,$req->edit_latitude));
        $data->qrcode_png=$qrcode_png;
        $data->qrcode_eps=$qrcode_eps;
        $data->qrcode_svg=$qrcode_svg;
        $data->save();
        Alert::Success('Qrcode Edited','Successfully !');
        return redirect('Add_Map');
    }

    public function Edit_Phone($id){
        $data = phonenumbers::WHERE('id',$id)->get();
        return view('admin.edit_phone',['data'=>$data]);
    }

    public function Edit_Phone_Confirm(Request $req,$id){
        $phone = phonenumbers::find($id);
        $phone->phone=$req->edit_phone;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->phoneNumber($req->edit_phone));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->phoneNumber($req->edit_phone));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->phoneNumber($req->edit_phone));
        $phone->qrcode_png=$qrcode_png;
        $phone->qrcode_eps=$qrcode_eps;
        $phone->qrcode_svg=$qrcode_svg;
        $phone->save();
        Alert::Success('Qrcode Edited','Successfully !');
        return redirect('Add_Phone');
    }

    public function Edit_SMS($id){
        $data = sms::WHERE('id',$id)->get();
        return view('admin.edit_sms',['data'=>$data]);
    }

    public function Edit_SMS_Confirm(Request $req,$id){
        $sms = sms::find($id);
        $sms->sms=$req->edit_sms;
        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->SMS($req->edit_sms));
        $qrcode_eps = "data:image/png;base64,".base64_encode(QrCode::format('eps')->size(300)->SMS($req->edit_sms));
        $qrcode_svg = "data:image/png;base64,".base64_encode(QrCode::format('svg')->size(300)->SMS($req->edit_sms));
        $sms->qrcode_png=$qrcode_png;
        $sms->qrcode_eps=$qrcode_eps;
        $sms->qrcode_svg=$qrcode_svg;
        $sms->save();
        Alert::Success('Qrcode Edited','Successfully !');
        return redirect('Add_SMS');
    }

    public function Edit_WIFI($id){
        $data = wifi::WHERE('id',$id)->get();
        return view('admin.edit_wifi',['data'=>$data]);
    }

    public function Edit_WIFI_Confirm(Request $req,$id){
        $wifi = wifi::find($id);
        $wifi->encryption=$req->edit_encryption;
        $wifi->title=$req->edit_title;
        $wifi->password=$req->edit_password;

        $qrcode_png = "data:image/png;base64,".base64_encode(QrCode::format('png')->size(300)->wiFi([
            'encryption' => $req->edit_encryption,
            'ssid' => $req->edit_title,
            'password' => $req->edit_password,

        ]));
        $qrcode_eps = "data:image/eps;base64,".base64_encode(QrCode::format('eps')->size(300)->wiFi([
            'encryption' => $req->edit_encryption,
            'ssid' => $req->edit_title,
            'password' => $req->edit_password,

        ]));
        $qrcode_svg = "data:image/svg;base64,".base64_encode(QrCode::format('svg')->size(300)->wiFi([
            'encryption' => $req->edit_encryption,
            'ssid' => $req->edit_title,
            'password' => $req->edit_password,

        ]));
        $wifi->qrcode_png=$qrcode_png;
        $wifi->qrcode_eps=$qrcode_eps;
        $wifi->qrcode_svg=$qrcode_svg;
        $wifi->save();
        Alert::Success('Qrcode Edited','Successfully !');
        return redirect('Add_WIFI');
    }


    //--------------------------------------------------------------DELETE DELETE DELETE DELETE DELETE DELETE DELETE------------------------------------------------------
    public function Delete_website_link($id){

        websites::where('id', $id)->delete();
        Alert::Success('Qrcode Deleted','Successfully !');
        return back();
       }

       public function Delete_Map($id){

        maps::where('id', $id)->delete();
        Alert::Success('Qrcode Deleted','Successfully !');
        return back();
       }

       public function Delete_Phone($id){

        phonenumbers::where('id', $id)->delete();
        Alert::Success('Qrcode Deleted','Successfully !');
        return back();
       }

       public function Delete_SMS($id){

        sms::where('id', $id)->delete();
        Alert::Success('Qrcode Deleted','Successfully !');
        return back();
       }

       public function Delete_WIFI($id){

        wifi::where('id', $id)->delete();
        Alert::Success('Qrcode Deleted','Successfully !');
        return back();
       }
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------


}


