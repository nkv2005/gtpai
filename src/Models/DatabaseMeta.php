<?php
namespace Zeemo\Gptai\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DatabaseMeta extends Model
{
    protected $table = 'gptmap';

    protected $fillable = [
        'tag_gpt_name',
        'response_gpt_name',
    ];

    public static function allTablesMySQL()
    {
      

        $tables_in_db = DB::select('SHOW TABLES');
        $tables = [];
        //echo $db = "Tables_in_".env('DB_DATABASE');
        foreach($tables_in_db as $table)
        {
            foreach ($table as $key => $val) {
                        $tables[]=$val;
                    }
        }
       return $tables;
    }

    public static function allTablesNameWithColumnMySQL($tables)
    {
       
        foreach($tables as $table)
        {
            $columns[$table]=DB::getSchemaBuilder()->getColumnListing($table);
        }

        return $columns;
    }

}
