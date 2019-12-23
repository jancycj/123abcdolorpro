<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Events\OrderShipped;
use App\Events\VacancyCreated;
use App\Notifications\InvoicePaid;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade as PDF;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testRedis', 'GeneralController@redis')->name('redis');
Route::get('/testMultiTenent', 'GeneralController@multi')->name('multi');
Route::get('get_pdf', function () {
    return view('pdf');
   
});

Route::get('eventss', function () {
    $order = 'got the event as i thought';
    event(new VacancyCreated($order));
    return 'good';
   
});

Route::get('notify', function () {
    $data['title'] = 'test';
    $data['content'] = 'test content';

    $pdf = PDF::loadView('pdf', $data);
    $pdf = $pdf->stream('invoice.pdf');
    $data['pdf'] = $pdf;
    

    Mail::send('Mail.mail',['data'=>$data], function ($message) use($pdf) {
        $message->from('john@johndoe.com', 'John Doe');
        $message->sender('john@johndoe.com', 'John Doe');
        $message->to('sajeer.logezy@gmail.com', 'John Doe');
        $message->cc(['sajeervsaleem@gmail.com','sajeer.logezy@gmail.com','sajeer.loegezy@logezy.com']);
        $message->bcc('sajeervasaleem@gmail.com', 'John Doe');
        $message->replyTo('john@johndoe.com', 'John Doe');
        $message->subject('Subject demo');
        $message->attachData($pdf, 'name.pdf', [
            'mime' => 'application/pdf',
        ]);
    });
    $data = 'tt';
    event(new OrderShipped($data));
    return ' event has dispatched';
   
});


Route::get('mail', function () {
    $data = ['title'=>'test for test', 'content'=>'gooooooooood'];
    Mail::send('Mail.mail', $data, function ($message) {
       
        $message->to('sajeer.logezy@gmail.com');
        $message->replyTo('sajeer.logezy@gmail.com');
        $message->subject('test sub');
        // $message->priority(3);
        // $message->attach('pathToFile');
    });
   
   
});