<?php namespace Library; 

class Controller
{
    protected function View($fileName,$data=[])
    {
        if(file_exists(APPROOT.'View/'.$fileName)){
            include_once(APPROOT."View/".$fileName);
        }else{
            Die('File Not Found');
        }
    }

    protected function Model($modelName)
    {
        if(file_exists(APPROOT.'Models/'.$modelName)){
            include_once(APPROOT."Models/".$modelName);
            return new $modelName;
        }else{
            Die('Model Not Found');
        }
    }



}