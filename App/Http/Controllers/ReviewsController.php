<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//composer require phpmailer/phpmailer

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
                'text' => htmlspecialchars_decode($d['review_text']),
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

    public static function GUIDv4 ($trim = true)
    {
        // Windows
        if (function_exists('com_create_guid') === true) {
            if ($trim === true)
                return trim(com_create_guid(), '{}');
            else
                return com_create_guid();
        }

        // OSX/Linux
        if (function_exists('openssl_random_pseudo_bytes') === true) {
            $data = openssl_random_pseudo_bytes(16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // set version to 0100
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // set bits 6-7 to 10
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }

        // Fallback (PHP 4.2+)
        mt_srand((double)microtime() * 10000);
        $charid = strtolower(md5(uniqid(rand(), true)));
        $hyphen = chr(45);                  // "-"
        $lbrace = $trim ? "" : chr(123);    // "{"
        $rbrace = $trim ? "" : chr(125);    // "}"
        $guidv4 = $lbrace.
            substr($charid,  0,  8).$hyphen.
            substr($charid,  8,  4).$hyphen.
            substr($charid, 12,  4).$hyphen.
            substr($charid, 16,  4).$hyphen.
            substr($charid, 20, 12).
            $rbrace;
        return $guidv4;
    }

    public static function SendMail($email, $fio, $guid)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->SMTPDebug = 1;

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;
        $mail->Username = 'mail.mydress@gmail.com'; // логин от вашей почты
        $mail->Password = 'nyjpikugwcrvanmg'; // пароль от почтового ящика // qwe1@3QWE
        $mail->SMTPSecure = 'SSL';
        $mail->Port = '587';

        $mail->CharSet = 'UTF-8';
        $mail->From = 'mail.mydress@gmail.com';  // адрес почты, с которой идет отправка
        $mail->FromName = 'MyDress'; // имя отправителя
        $mail->addAddress($email, $fio);

        $mail->isHTML(true);

        $mail->Subject = 'Регистрация';
        $mail->Body = "Для подтверждения регистрации нажмите на ссылку: http://127.0.0.1:8000/register/".$guid;
        $mail->AltBody = "Для подтверждения регистрации нажмите на ссылку: http://127.0.0.1:8000/register/".$guid;

        $mail->SMTPDebug = 0;

        if ($mail->send()) {
            $answer = '1';
        } else {
            $answer = '0';
//            echo 'Письмо не может быть отправлено. ';
//            echo 'Ошибка: ' . $mail->ErrorInfo;
        }
//        die($answer);
    }
}
