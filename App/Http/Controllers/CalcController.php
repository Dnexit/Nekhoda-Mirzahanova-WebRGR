<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function Trench(Request $request)
    {
        $valid = $request->validate([
            'ground-type' => 'required|min:1',
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] >= 50 && $request['pass-height'] >= 150)
        {
            if($request['pass-height'] < 160)
            {
                $price = 4500;
            }
            else{
                if($request['pass-width'] <= 60)
                {
                    $price = 30*$request['pass-height'];
                }
                else{
                    $price = 40*$request['pass-height'];
                }
            }
        }
       
        $price += $this->GetPriceLocation($request['delivery'], $request['distance']);
        if($request['communications-search'] > 1 )
        {
            $price = $price."₽ + 2500₽";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] < 50 || $request['pass-height'] < 150 || $request['pass-width'] > 80 || $request['pass-height'] > 190)
        {
            $price = 'Индивидуальный звонок';
        }
        $data = ['price' => $price];
        return view('price', $data);
    }

    public function Pit(Request $request)
    {
        $valid = $request->validate([
            'ground-type' => 'required',
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] <= 5 && $request['pass-height'] <= 30)
            if($request['ground-type'] == 1)
                $price = 1000;
            else if($request['ground-type'] == 2) {
                $price = 1500;
            }
            else if($request['ground-type'] == 3) {
                $price = 2000;
            }
            else if($request['ground-type'] == 4) {
                $price = 800;
            }
        else $price = 'Индивидуальный звонок';


        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 2500₽";
        }
        else
        {
            $price = $price."₽";
        }
        if(['pit-lenght'] > 5 || $request['pit-lenghtpit-width'] > 30)
        {
            $price = 'Индивидуальный звонок';
        }
        $data = ['price' => $price];
        return view('price', $data);
    }

    public function Planning(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        $cubes = ($request['area-max-length'] /2) * $request['area-lenght'] * $request['area-width'];
        $time = $cubes / 7;
        if($request['pass-width'] >= 150 && $request['pass-height'] >= 250)
        {
            $price = $time * 1500;
        }
        else if($request['pass-width'] >= 160 && $request['pass-height'] >= 200)
        {
            $price = $time * 1700;
        }
        $price += $this->GetPriceLocation($request['delivery'], $request['distance']);
        if($request['ground-type']>5)
        {
            $price = $price."₽ + 2500₽";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] < 150 || $request['pass-height'] < 200 || $request['communications-search'] > 1)
        {
            $price = 'Индивидуальный звонок';
        }

        $data = ['price' => $price];
        return view('price', $data);
    }

    public function Terracing(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] >= 50 && $request['pass-height'] >= 100)
        {
            $price = $request['pass-width'] * 50;
        }
        else if($request['pass-width'] >= 80 && $request['pass-height'] >= 120)
        {
            $price = $request['pass-width'] * 60;
        }
        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 2500₽";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] < 50 || $request['pass-height'] < 90 || $request['pass-width'] > 100 || $request['pass-height'] > 140 )
        {
            $price = 'Индивидуальный звонок';
        }

        $data = ['price' => $price];
        return view('price', $data);
    }

    public function Pants(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] >= 15 && $request['pass-width'] < 20 && $request['pass-height'] >= 170)
        {
            $price = 1000;
        }
        else if($request['pass-width'] >= 20 && $request['pass-width'] < 30 && $request['pass-height'] >= 170)
        {
            $price = 1500;
        }
        else if($request['pass-width'] >= 30 && $request['pass-height'] >= 170)
        {
            $price = 2000;
        }
        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 1000₽";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] > 40 || $request['pass-width'] < 15 || $request['pass-height'] > 180 || $request['pass-height'] < 170)
        {
            $price = 'Индивидуальный звонок';
        }

        $data = ['price' => $price];
        return view('price', $data);
    }

    public function TeeShirt(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] >= 15 && $request['pass-height'] >= 20 && $request['pass-height'] < 40)
        {
            $price = 600;
        }
        else if($request['pass-width'] >= 15 && $request['pass-height'] >= 40 && $request['pass-height'] < 60)
        {
            $price = 800;
        }
        else if($request['pass-width'] >= 15 && $request['pass-height'] >= 60)
        {
            $price = 1000;
        }
        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 1000₽";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] > 25 || $request['pass-width'] < 15 || $request['pass-height'] > 80 || $request['pass-height'] < 20)
        {
            $price = 'Индивидуальный звонок';
        }

        $data = ['price' => $price];
        return view('price', $data);
    }

    function GetPriceLocation($location, $distance)
    {
        switch ($location){
            case 1:
                return 2000;
            case 2:
                return $distance * 40 * 2;
            case 3:
                return $distance * 40 * 2 + 3000;
        }
    }
}
