<?php

namespace Zeemo\Gptai\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Zeemo\Gptai\Models\DatabaseMeta;
use Illuminate\Database\Eloquent\Model;

class GptaiMapController extends Controller
{
    public function index()
    {

         return redirect()->route('mapfield.create');
    }  

    public function create()
    {      
        $allTables = DatabaseMeta::allTablesMySQL();
        $allTablesNameWithColumn= DatabaseMeta::allTablesNameWithColumnMySQL($allTables);
        
       // echo "<pre>";
      //  print_r($allTablesNameWithColumn);
        $DatabaseMeta = DatabaseMeta::all();
        $submit = 'Add';
        return view('zeemo.gptai.mapcolumn', compact('allTablesNameWithColumn', 'submit','DatabaseMeta'));
    }

    public function store()
    {

        $input = Request::all();
        DatabaseMeta::create($input);       
        //DatabaseMeta::create($input);
       // return redirect()->route('/mapfield');
        return redirect('/mapfield');
    }

     public function destroy($id)
    {
        
        $DatabaseMeta = DatabaseMeta::findOrFail($id);
        $DatabaseMeta->delete();
        return redirect()->route('mapfield.create');
    }
   
}
