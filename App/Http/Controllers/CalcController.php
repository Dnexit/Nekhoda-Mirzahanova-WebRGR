<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function dress(Request $request)
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
       
        if($request['communications-search'] > 1 )
        {
            $price = $price."₽ + 1000";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] < 40 || $request['pass-width'] > 80  || $request['pass-height'] < 150|| $request['pass-height'] > 190)
        {
            $price = 'Индивидуальный звонок';
        }
        $data = ['price' => $price];
        return view('price', $data);
    }

    public function Top(Request $request)
    {
        $valid = $request->validate([
            'top-type' => 'required',
            'pass-width' => 'required',
            'pass-length' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] <= 5 && $request['pass-length'] <= 30){
            if($request['top-type'] == 1)
                $price = 1000;
            else if($request['top-type'] == 2) {
                $price = 1500;
            }
            else if($request['top-type'] == 3) {
                $price = 2000;
            }
            else if($request['top-type'] == 4) {
                $price = 800;
            }
        }

        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 1000";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] > 5 || $request['pass-length'] > 30)
        {
            $price = 'Индивидуальный звонок';
        }
        $data = ['price' => $price];
        return view('price', $data);
    }

    public function Socks(Request $request)
    {
        $valid = $request->validate([
            'pass-size' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-size'] >= 36 && $request['pass-height'] >= 3 && $request['pass-height'] < 6)
        {
            $price = 50;
        }
        else if($request['pass-size'] >= 36 && $request['pass-height'] >= 6 && $request['pass-height'] <= 10)
        {
            $price = 100;
        }
        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 150₽";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-size'] < 36 || $request['pass-size'] > 48 || $request['pass-height'] < 3 || $request['pass-height'] > 10)
        {
            $price = 'Индивидуальный звонок';
        }

        $data = ['price' => $price];
        return view('price', $data);
    }

    public function hoodie(Request $request)
    {
        $valid = $request->validate([
            'pass-width' => 'required',
            'pass-height' => 'required',
            'communications-search' => 'required',
        ]);

        $price = 0;
        if($request['pass-width'] >= 50 && $request['pass-width'] < 80 && $request['pass-height'] >= 100 && $request['pass-height'] < 120)
        {
            $price = $request['pass-width'] * 50;
        }
        else if($request['pass-width'] >= 80 && $request['pass-height'] >= 120)
        {
            $price = $request['pass-width'] * 60;
        }
        if($request['communications-search'] > 1)
        {
            $price = $price."₽ + 1500";
        }
        else
        {
            $price = $price."₽";
        }
        if($request['pass-width'] < 50 || $request['pass-height'] > 90 || $request['pass-width'] < 100 || $request['pass-height'] > 140 )
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

}
