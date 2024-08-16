<?php
namespace Zeemo\Gptai\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class GenerateAiTrainData extends Model
{
    
    public static function createDataJson()
    {
       
       $gptmapDatas = DB::table('gptmap')->get();
       $arrayMixData=array();
       foreach($gptmapDatas as $gptmapData)
       {
          
          $tag_gpt_name=explode("-",$gptmapData->tag_gpt_name);
          $response_gpt_name=explode("-",$gptmapData->response_gpt_name);
          $arrayMixData['tag']['tablename'][]=$tag_gpt_name[0];
          $arrayMixData['tag']['fieldname'][]=$tag_gpt_name[1];
          $arrayMixData['response']['tablename'][]=$response_gpt_name[0];
          $arrayMixData['response']['fieldname'][]=$response_gpt_name[1];

       } 
       
      

       $mapdatas=self::getMapData($arrayMixData);
   
       
       
       $jsondataForAi=array();
        

       for($i=0;$i<count($mapdatas['tag']);$i++)
       {
                $jsonreturndata=array();
                $jsonreturndata['tag']=$mapdatas['tag'][$i];
                $jsonreturndata['patterns']=array();
               for($j=0;$j<count($mapdatas['pattern'][$i]);$j++)
               {

                 $jsonreturndata['patterns'][]=$mapdatas['pattern'][$i][$j];     
               }
            
            $jsonreturndata['response']=$mapdatas['response'][$i];

            $jsondataForAi[]=$jsonreturndata;  

       }
     
       return $jsondataForAi;
         
    }

    public static function getMapData($arrayMixData)
    {
        $dataarray=array();
        
        $patetternDatas=self::getListPatternData();
         $k=0;
        for($i=0;$i<count($arrayMixData['tag']['tablename']);$i++)
        {
           $tableFieldDatas = DB::table($arrayMixData['tag']['tablename'][$i])->select($arrayMixData['tag']['fieldname'][$i])->get();
           $fieldname=$arrayMixData['tag']['fieldname'][$i];
            //echo "<pre>ooo";
           // print_R($tableFieldDatas);
            
            foreach($tableFieldDatas as $tableFieldData=>$value)
            {

               // echo "<pre>";
                // print_R($value);
                 $dataarray['tag'][]=$value->$fieldname;
                 $tag=$value->$fieldname;
                 foreach($patetternDatas as $patetternData)
                 {
                    $pattern=$patetternData->name;
                    $dataarray['pattern'][$k][]=$pattern." ".$tag;
                 }
              $k++;      
            }
            
        }


        for($i=0;$i<count($arrayMixData['response']['tablename']);$i++)
        {
           $tableFieldDatas = DB::table($arrayMixData['response']['tablename'][$i])->select($arrayMixData['response']['fieldname'][$i])->get();
           $fieldname=$arrayMixData['response']['fieldname'][$i];
            //echo "<pre>ooo";
           // print_R($tableFieldDatas);
            foreach($tableFieldDatas as $tableFieldData=>$value)
           {
                 $dataarray['response'][]=$value->$fieldname;
                 
            }
            
        }

       // echo "<pre>";
       // print_R($dataarray);
       // die;
        return $dataarray;

    }


    public static function getListPatternData()
    {
      
       $patternDatas = DB::table("tasks")->select("name")->get();
       return $patternDatas;
    }


}
