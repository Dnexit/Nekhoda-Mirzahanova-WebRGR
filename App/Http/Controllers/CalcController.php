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
        if($request['pass-width'] < 40 || $request['pass-height'] < 100 || $request['pass-width'] > 80 || $request['pass-height'] > 190)
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

    public function Hydrodrill(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['hole-depth'] <= 100)
        {
            if($request['trench-width'] <= 12)
            {
                $price += $this->GetPriceLocation($request['delivery'], $request['distance']);
                $data = ['price' => $price];
                return view('price', $data);
            }
            else
            {
                $price = 550 * $request['trench-width'];
            }
        }
        else if ($request['hole-depth'] < 200)
        {
            if($request['trench-width'] <= 12)
            {
                $price += $this->GetPriceLocation($request['delivery'], $request['distance']);
                $price = $price.' + 2000₽/час';
                $data = ['price' => $price];
                return view('price', $data);
            }
            else
            {
                $price = 600 * $request['trench-width'];
            }
        }
        else
        {
            $price = 'Индивидуальный звонок';
            $data = ['price' => $price];
            return view('price', $data);
        }
        $price += $this->GetPriceLocation($request['delivery'], $request['distance']);
        if($request['ground-type']>5)
        {
            $price = $price."₽ + 2500₽/час";
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

    public function FoundationPit(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] >= 50 && $request['pass-height'] >= 90)
        {
            $price = $request['pass-width']*30;
        }
        else if($request['pass-width'] >= 70 && $request['pass-height'] >= 100)
        {
            $price = $request['pass-width'] * 40;
        }
        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 2500₽/час";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] >= 80 || $request['pass-height'] >= 110 )
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
