<?php

namespace Zeemo\Gptai\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Zeemo\Gptai\Models\Gptaisetting;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Zeemo\Gptai\Models\Apiuser;

class GptaiMapSettingContorller extends Controller
{
 
    public function setting()
    {
           
        $setting=Gptaisetting::findOrFail('1');
        $submit = 'Update';
       
        return view('zeemo.gptai.setting', compact('setting', 'submit'));
    }

    public function update()
    {
        $input = Request::all();
        $id='1';
        $setting = Gptaisetting::findOrFail($id);
        $setting->update($input);
        return redirect('/restapiuser');
    }
     
     public function delete($id)
     {
        Apiuser::DeleteUser($id);
        return redirect('/restapiuser');
        
     }

     public function createdata()
     {
       
            
     }

     public function restapiuser()
     {
         
         $alluserdetails=Apiuser::GetAllUsersWithDetails();
         $setting="";
         $submit ='Create';
        return view('zeemo.gptai.apisetting', compact('setting', 'submit','alluserdetails'));

     }
     
     public function postapiuser()
     {
       
        $client = new Client();
        $input = Request::all();
        $name=$input['username'];
        $email=$input['email'];
        $password=$input['password'];
        $c_password=$input['c_password'];


        $res = $client->request('POST', 'http://zeemolocaldemo81.au/zeemocms4niraj/api/register', [
            'form_params' => [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'c_password' => $c_password
            ]
        ]);

        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
            $responsearray=json_decode($response_data);
           
            $objrsdata=$responsearray->data;
            $userid=$objrsdata->user_id;
            $token=$objrsdata->token;

            $setting = Apiuser::updatetoken($userid,$token);


        }
          
        return redirect('/restapiuser');
       // $submit = 'Create';       
      //  return view('zeemo.gptai.apisetting', compact('setting', 'submit'));

     }

     


     

}
