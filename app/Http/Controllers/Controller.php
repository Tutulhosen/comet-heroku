<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * convert a youtube or vimeo video in embed mood
     */
    public function embed($link)
    {
       

            if (strpos($link, 'vimeo.com/')) {

                $arr= explode('vimeo.com/', $link);
                $id=$arr[1];
                return "https://player.vimeo.com/video/{$id}";
                



            } else {
                
                    $arr= explode('=', $link);
                    $arr_id=$arr[1];
                    if (strpos($arr_id, '&t')) {
                        $embt= trim($arr_id, '&t');
                        return "https://www.youtube.com/embed/{$embt}";
                    }else{
                        return "https://www.youtube.com/embed/{$arr_id}";
                    }
            }
            

    }







}
