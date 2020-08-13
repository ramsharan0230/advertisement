<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Advertisement;
use DateTime;
use Auth;

class AdvertisementController extends Controller
{
    public function index(){
        $globalTime = new DateTime();
        $now = Carbon::parse($globalTime, 'CST')->setTimezone('Asia/Kathmandu');
        $recentlyAdded = Advertisement::where('expired_date', '>', $now)->where('count', 0)->distinct()->orderBy('id', 'DESC')->get();
        // dd(Advertisement::distinct()->get());
        $firstTimeUpgraded = Advertisement::where('expired_date', '>', $now)->where('count', 1)->distinct()->orderBy('id', 'DESC')->get();
        $secondTimeUpgraded = Advertisement::where('expired_date', '>', $now)->where('count', 2)->distinct()->orderBy('id', 'DESC')->get();
        $thirdTimeUpgraded = Advertisement::where('expired_date', '>', $now)->where('count', 3)->distinct()->orderBy('id', 'DESC')->get();
        $fourthTimeUpgraded = Advertisement::where('expired_date', '>', $now)->where('count', 4)->distinct()->orderBy('id', 'DESC')->get();
        $merged1 = $recentlyAdded->merge($firstTimeUpgraded);
        $merged2 = $merged1->merge($secondTimeUpgraded);
        $merged3 = $merged2->merge($thirdTimeUpgraded);
        $ads = $merged3->merge($fourthTimeUpgraded);
        return $ads;
    }
    public function __construct()
    {
        $globalTime = new DateTime();
        $now = Carbon::parse($globalTime, 'CST')->setTimezone('Asia/Kathmandu');
        // Daily ADs
        $oneDayAds = Advertisement::where('type', 'day')->where('expired_date','<', $now)->get();
        foreach($oneDayAds as $dailyad){
            $expired_at = Carbon::parse(date_format($dailyad->expired_date,'Y-m-d H:i:s'));
            $dailyHoursDiff = $now->diffInHours($expired_at);
            if($dailyHoursDiff == 24 && $dailyad->count == 0){
                if($dailyad->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $dailyad->id)->update([
                        'expired_date'=>  $expired_at->addDays(1),
                        'count' => $dailyad->count + 1
                    ]);
                }
            }else if($dailyHoursDiff == 48 && $dailyad->count == 1){
                $updateExpiredDateForDay = Advertisement::where('id', $dailyad->id)->update([
                    'expired_date'=>  $expired_at->addDays(1),
                    'count' => $dailyad->count + 1
                ]);
            }
            else if($dailyHoursDiff == 72 && $dailyad->count == 2){
                $updateExpiredDateForDay = Advertisement::where('id', $dailyad->id)->update([
                    'expired_date'=>  $expired_at->addDays(1),
                    'count' => $dailyad->count + 1
                ]);
            }
            else if($dailyHoursDiff == 96 && $dailyad->count == 3){
                $updateExpiredDateForDay = Advertisement::where('id', $dailyad->id)->update([
                    'expired_date'=>  $expired_at->addDays(1),
                    'count' => $dailyad->count + 1
                ]);
            }
            else if($dailyHoursDiff == 120 && $dailyad->count == 4){
                $updateExpiredDateForDay = Advertisement::where('id', $dailyad->id)->update([
                    'expired_date'=>  $expired_at->addDays(1),
                    'count' => $dailyad->count + 1
                ]);
            }
        }

        // Weekly ADs
        $weeklyAds = Advertisement::where('type', 'week')->where('expired_date','<', $now)->get();
        foreach($weeklyAds as $weeklyAd){
            $expired_at = Carbon::parse(date_format($weeklyAd->expired_date,'Y-m-d H:i:s'));
            $weekHoursDiff = $now->diffInHours($expired_at);
            if($weekHoursDiff==24 && $weeklyAd->count == 0){
                if($weeklyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $weeklyAd->id)->update([
                        'expired_date'=>  $expired_at->addWeekday(),
                        'count' => $weeklyAd->count + 1
                    ]);
                }
            }
            else if($weekHoursDiff==48 && $weeklyAd->count == 1){
                if($weeklyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $weeklyAd->id)->update([
                        'expired_date'=>  $expired_at->addWeekday(),
                        'count' => $weeklyAd->count + 1
                    ]);
                }
            }
            else if($weekHoursDiff==72 && $weeklyAd->count == 2){
                if($weeklyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $weeklyAd->id)->update([
                        'expired_date'=>  $expired_at->addWeekday(),
                        'count' => $weeklyAd->count + 1
                    ]);
                }
            }
            else if($weekHoursDiff==96 && $weeklyAd->count == 3){
                if($weeklyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $weeklyAd->id)->update([
                        'expired_date'=>  $expired_at->addWeekday(),
                        'count' => $weeklyAd->count + 1
                    ]);
                }
            }
            else if($weekHoursDiff==120 && $weeklyAd->count == 4){
                if($weeklyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $weeklyAd->id)->update([
                        'expired_date'=>  $expired_at->addWeekday(),
                        'count' => $weeklyAd->count + 1
                    ]);
                }
            }
        }
        // Monthly ADs
        $monthlyAds = Advertisement::where('type', 'month')->where('expired_date','<', $now)->get();
        foreach($monthlyAds as $monthlyAd){
            $expired_at = Carbon::parse(date_format($monthlyAd->expired_date,'Y-m-d H:i:s'));
            $monthyHourDiff = $now->diffInHours($expired_at);
            
            if($monthyHourDiff>=24 && $monthlyAd->count==0){
                if($monthlyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $monthlyAd->id)->update([
                        'expired_date'=>  $expired_at->addMonth(),
                        'count' => $monthlyAd->count + 1
                    ]);
                }
            }
            else if($monthyHourDiff>=48 && $monthlyAd->count==1){
                if($monthlyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $monthlyAd->id)->update([
                        'expired_date'=>  $expired_at->addMonth(),
                        'count' => $monthlyAd->count + 1
                    ]);
                }
            }
            else if($monthyHourDiff>=72 && $monthlyAd->count==2){
                if($monthlyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $monthlyAd->id)->update([
                        'expired_date'=>  $expired_at->addMonth(),
                        'count' => $monthlyAd->count + 1
                    ]);
                }
            }
            else if($monthyHourDiff>=96 && $monthlyAd->count==3){
                if($monthlyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $monthlyAd->id)->update([
                        'expired_date'=>  $expired_at->addMonth(),
                        'count' => $monthlyAd->count + 1
                    ]);
                }
            }
            else if($monthyHourDiff>=120 && $monthlyAd->count==4){
                if($monthlyAd->count > 5){
                    $updateExpiredDateForDay = Advertisement::where('id', $monthlyAd->id)->update([
                        'expired_date'=>  $expired_at->addMonth(),
                        'count' => $monthlyAd->count + 1
                    ]);
                }
            }
        }
    }


    public function create(){
        return view('advertisement.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|min:2|max:255',
            'type' => 'required',
            'image_file' => 'required|mimes:jpeg,bmp,png',
            'datetimes' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }

        if( $request->hasFile('image_file') ) {
            $image = $request->file('image_file');
            $image_file_toUpload = time() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('public/images/'), $image_file_toUpload);
        }
        // 2020-08-12 11:20:52.000000
        $date = new DateTime('now');
        $date->modify('last day of this month');
        $lastDateOfMonth = $date->format('Y-m-d');
        $explodedDate = explode('-', $lastDateOfMonth);
        $lastDayOfMonth = $explodedDate[2];
        $dateRow = explode(' ', $request->datetimes);
        $date = explode('-', $dateRow[0]);
        // dd($dateRow[2]);
        if($request->type=="day"){
            if($lastDayOfMonth == $date[2]){
                if($date[1]=='09')
                    $month = $date[1] + 1;
                else{
                    $monthRow = $date[1] + 1;
                    $month = '0'.$monthRow;
                }
                $day = '01';
                $year = $date[0];
                $expired_date = $year.'-'.$month.'-'.$day.' '.$dateRow[1];
            }else{
                $year = $date[0];
                $month = $date[1];
                $day = $date[2] + 1;
                if($day <= 9)
                    $day = '0'.$day;

                $expired_date = $year.'-'.$month.'-'.$day.' '.$dateRow[1];
            }
        }
        else if($request->type=="week"){
            if($lastDayOfMonth > ($date[2] + 7)){
                $year = $date[0];
                $month = $date[1];
                $day = $date[2] + 7;
                if($day <= 9)
                    $day = '0'.$day;

                $expired_date = $year.'-'.$month.'-'.$day.' '.$dateRow[1];
            }
            else{
                for($i=1; $i<7; $i++){
                    if($date[2] <= $lastDayOfMonth){
                        $date[2] += $i;
                        $passedDay = $i;
                    }
                }
                $dayToBeAdded =  $remainingDay = 7- $passedDay;
                $month = $date[1] + 1;
                $day = 0 .''. $dayToBeAdded;
                $year = $date[0];

                if($month<10)
                    $month = '0'.$month;
                
                $expired_date = $year.'-'.$month.'-'.$day.' '.$dateRow[1];
            }
        }
        else{
            $month = $date[1]+1;
            if($month<10)
                $month = '0'.$month;
            $expired_date = $date[0].'-'.$month.'-'.$date[2].' '.$dateRow[1];
        }

        // dd($dateRow[2]);
        if($dateRow[2] == "AM"){
            $start_date = $dateRow[0].' '.$dateRow[1];
        }
        else{
            $time = explode(':', $dateRow[1]);
            $preTime = 12 + $time[0].':'.$time[1].':'.$time[2];
            $start_date = $date[0].' '.$preTime;
        }
        
        $ads = new Advertisement();
        $ads->title = $request->title;
        $ads->image_file = $image_file_toUpload;
        $ads->type = $request->type;
        $ads->start_date = $start_date;
        $ads->expired_date = $expired_date;
        $ads->user_id = Auth::id();
        $ads->save();

        if($ads){
            return redirect()->route('vendor')
                ->with('success','Advertisement has been created!');
        }else{
            return redirect()->route('vendor')
                ->with('danger','Soryy, Advertisement doesn`t create!');
        }
    }
}
