<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Schedule;

class ScheduleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule  = Schedule::all();

        $data = [];
        foreach ($schedule as $key => $value) {
            
            $data[$key]['team1']        = $value->team1;
            $data[$key]['team2']        = $value->team2;

            //GET THE TIME NOW
            $now          = new \DateTime('now', new \DateTimeZone('Asia/Manila'));
            $time         = new \DateTime($value->time_until, new \DateTimeZone('Asia/Manila'));

            $data[$key]['team1_score']      = $value->team1_score;
            $data[$key]['team2_score']      = $value->team2_score;

            if ($value->team1_score > $value->team2_score) {
                $data[$key]['winner']           = $value->team1 . " def " . $value->team2;
            }elseif($value->team1_score == $value->team2_score){
                $data[$key]['winner'] = null;
            }else{
                $data[$key]['winner'] = $value->team2 . " def " . $value->team1;
            }

            $interval = $now->diff($time);

            //GET THE SCHEDULE
            if ($now > $time) {
               //past
                if ($interval->format('%h') == 0) {
                    $data[$key]['status']   = 'currently playing';
                }else{
                    $data[$key]['status']   = $interval->format('%h hour ago');
                }
            
            }else{
                
                //future
                $data[$key]['status']       = 'playing in ' . $time->format('H') . ' hours';
            }   
        }

        return response()->json($data);
    }
}
