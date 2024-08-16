<?php
namespace Zeemo\Gptai\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Apiuser extends Model
{
   
   public static function updatetoken($user_id,$token)
    {
        $affected = DB::table('oauth_access_tokens')
              ->where('user_id', $user_id)
              ->update(['token' => $token]);
    }

    public static function GetAllUsersWithDetails()
    {
      
         $users = DB::table('users')
            ->join('oauth_access_tokens', 'users.id', '=', 'oauth_access_tokens.user_id')            
            ->select('users.*', 'oauth_access_tokens.token')
            ->get();        
       return $users;

    }
    public static function DeleteUser($user_id)
    {
          DB::delete('delete from oauth_access_tokens where user_id = ?',[$user_id]);
          DB::delete('delete from users where id = ?',[$user_id]);
    }
    

}
