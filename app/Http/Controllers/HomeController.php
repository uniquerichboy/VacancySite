<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;
use App\Models\Orders;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    // Главная страница
    public function index()
    {
        $vacancy = Vacancies::paginate(15);
        // Проверяем на авторизованного пользователя
        // if(Auth::user()){
        //     $vac = Vacancies::where('user_id', Auth::user()->id)->first();
        //     $orders = Orders::where('vacancy_id', $vac->id)->first();

        //     return view('home', [
        //         'vacancy' => $vacancy,
        //         'orders' => $orders,
        //     ]);
        // }

        return view('home', [
            'vacancy' => $vacancy
        ]);
    }

    // Страница создания вакансии
    public function create()
    {
        // Выводим все с проверкой на пользователя
        $vacancy = Vacancies::where('user_id', Auth::user()->id)->paginate(15);

        return view('create', [
            'vacancy' => $vacancy
        ]);
    }

    // Запрос на создание вакансии
    public function createVac(Request $request)
    {
        // Создаем запись в базе
        Vacancies::create([
            'title' => $request['title'],
            'amount' => $request['amount'],
            'user_id' => Auth::user()->id,
            'description' => $request['desc'],
            'phone' => $request['phone'],
            'vk' => $request['vk'],
            'telegram' => $request['telegram'],
            'city' => $request['city'],
            'experience' => $request['experience'],
            'skills' => $request['skills'],
        ]);

        // Возвращаем пользователя назад
        return redirect()->route('create')->with('message','Ура! Вакансия создана!');
    }

    // Ищем в базе такие названия 
    public function search(Request $request)
    {
        if($request['title'] == null){
            return redirect()->back()->with('info','Вы ничего не ввели :(');
        }

        $vacancy = Vacancies::where('title', $request->get('title'))->paginate(15);

        return view('home', [
            'vacancy' => $vacancy
        ]);
    }

    // Страница вакансии
    public function vacancy($id)
    {
        $vacancy = Vacancies::where('id', $id)->first();

        return view('vacancy', [
            'vacancy' => $vacancy
        ]);
    }

    // Откликаемся на вакансию
    public function send(Request $request, $id)
    {
        $vac = Vacancies::where('id', $id)->first();

        if($request['message'] == null){
            return redirect()->back()->with('error','Вы забыли указать контактные данные');
        } else if(!isset(Auth::user()->id)){
            return redirect()->route('login')->with('error','Вы не вошли на сайт');
        } else if($vac->user_id == Auth::user()->id) {
            return redirect()->route('home')->with('error','Вы не можете откликаться на свою же вакансию');
        }
 

        // Создаем запись в базе
        Orders::create([
            'user_id' => Auth::user()->id,
            'vacancy_id' => $id,
            'vacancy_user' => $vac->user_id,
            'message' => $request['message'],
        ]);

        // Возвращаем пользователя назад
        return redirect()->back()->with('message','Отклик отправлен');
    }

    // Отклики 
    public function message()
    { 
        $orders = Orders::where('vacancy_user', Auth::user()->id)->paginate(20);
        // Пересобираем массив
        $array = [];
        foreach($orders as $key => $ord){
            $vac = Vacancies::where('id', $ord->vacancy_id)->first();
            $user = User::where('id', $ord->vacancy_user)->first();
            $array[] = [
                'id' => $ord->id,
                'user_id' => $ord->user_id,
                'vacancy_id' => $ord->vacancy_id,
                'vacancy_user' => $ord->vacancy_user,
                'message' => $ord->message,
                'username' => $user->name,
                'title' => $vac->title,
            ];
        }
        
        return view('message', [
            'orders' => $array,
        ]);
    }

    // Просмотр отклика
    public function messageId($id)
    {
        $orders = Orders::where('id', $id)->first();

        return view('messageId', [
            'orders' => $orders
        ]);
    }
}
