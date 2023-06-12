<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReviewModel;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function Reviews()
    {
        //ReviewModel::find(1)->user['FIO'];
        //ReviewModel::find(1)->all();
        $data = [];
        if (ReviewModel::count() == 0)
        {
            return view('reviews', ["empty" => 1]);
        }
        $datas = ReviewModel::find(1)->all();
        foreach ($datas as $d)
        {
            $data[$d['id']] = [
                'id' => $d['id'],
                'fio' => ReviewModel::find($d['id'])->user['FIO'],
                'text' => $d['review_text'],
                'timestamp' => $d['timestamp'],
            ];
        }
        return view('reviews', ["data" => $data]);
    }

    public function AddReview(Request $request)
    {
        $valid = $request->validate([
            'reviewtext' => 'required',
        ]);

        $user = new ReviewModel();

        $user->user_email = session('email');
        $user->review_text = $request->input('reviewtext');
        $user->timestamp = date('d.m.Y \в H:i');

        $user->save();

        $data = [];
        $datas = ReviewModel::find(1)->all();
        foreach ($datas as $d)
        {
            $data[$d['id']] = [
                'id' => $d['id'],
                'fio' => ReviewModel::find($d['id'])->user['FIO'],
                'text' => $d['review_text'],
                'timestamp' => $d['timestamp'],
            ];
        }

        return view('reviews', ["data" => $data]);
    }

    public function EditReview($id)
    {
        $data = [];
        if (ReviewModel::count() == 0)
        {
            return view('reviews', ["empty" => 1]);
        }
        $datas = ReviewModel::findOrFail(1)->all();
        $data['review_text'] = $this->FindInData($datas, $id)['review_text'];
        $data['id'] = $id;

        return view('reviews_editor', ['data' => $data]);
    }

    public function EditReviewResult(Request $request, $id)
    {
        $valid = $request->validate([
            'reviewtext' => 'required',
        ]);

        ReviewModel::where('id', $id)->update(array('review_text' => $request->input('reviewtext')));

       return redirect()->route('reviews');
    }

    public function DeleteReview($id)
    {
        ReviewModel::where('id', $id)->delete();

        return redirect()->route('reviews');
    }

    public function FindInData($datas, $id)
    {
        foreach ($datas as $d)
        {
            if ($d['id'] == $id)
                return $d;
        }
    }
}
