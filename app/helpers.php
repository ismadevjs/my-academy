<?php

if (! function_exists('img')) {
    function img($request, $name) {
        if($request->file($name)){
            $file= $request->file($name);
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
            return $filename;
        }
    }
}