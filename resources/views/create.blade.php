@extends('layouts.app')

@section('content')
<main>
  <div class="container">
    <div class="py-5 text-center">
      <h2>Создание вакансии</h2>
      <p class="lead">Заполните все поля и делайте это очень внимательно.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-12">
        <h4 class="mb-3">Основное вакансии</h4>
        <form class="needs-validation" action="{{ route('createVac') }}" method="get">
        @csrf
          <div class="row g-3 mb-3">
            <div class="col-sm-6 mb-3">
              <label for="title" class="form-label">Название вакансии</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Название вакансии" required="">
            </div>
 
            <div class="col-sm-6">
              <label for="amount" class="form-label">Сумма оплаты труда</label>
              <input type="number" class="form-control" name="amount" id="amount" placeholder="Сумма оплаты труда" required="">
            </div>

            <div class="col-sm-6 mb-3">
              <label for="desc" class="form-label">Описание вакансии</label>
              <textarea name="desc" id="desc" cols="30" class="form-control" rows="10" placeholder="Описание вакансии" required=""></textarea>
            </div>

            <div class="col-sm-6">
              <label for="experience" class="form-label">Требуемый опыт работы (В годах)</label>
              <input type="number" class="form-control" name="experience" id="experience" placeholder="Требуемый опыт работы" required="">
            </div>

            <div class="col-sm-6">
              <label for="skills" class="form-label">Ключевые навыки</label>
              <input type="text" class="form-control" name="skills" id="skills" placeholder="Ключевые навыки" required="">
            </div>

          </div>

          <h4 class="mb-3">Контактные данные</h4>
          
          <div class="row g-3 mb-3">

            <div class="col-sm-6 mb-3">
              <label for="city" class="form-label">Адресс работы</label>
              <input type="text" class="form-control" name="city" id="city" placeholder="Адресс работы" required="">
            </div>

            <div class="col-sm-6">
              <label for="phone" class="form-label">Номер телефона</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Номер телефона" required="">
            </div> 

            <div class="col-12 mb-3">
              <label for="telegram" class="form-label">Telegram (Без ссылок)</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" name="telegram" id="telegram" placeholder="username" required="">
              </div> 
            </div>

            <div class="col-sm-6">
              <label for="vk" class="form-label">Вконтакте</label>
              <input type="text" class="form-control" name="vk" id="vk" placeholder="Не обязательно">
            </div>
            
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Создать вакансию</button>
        </form>
      </div>
    </div>
  </div>

  <div class="container">
  <h4 class="mb-3 mt-3">Ваши вакансии</h4>

  <div class="container">
    @foreach($vacancy as $vac)
    <div class="col-md-12 list-group mb-2">
      <a href="{{ route('vacancy', ['id' => $vac->id]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">{{ $vac->title }}</h6>
            <p class="mb-0 opacity-75">{{ $vac->city }}</p>
          </div>
          <small class="opacity-50 text-nowrap">Оплата: {{ $vac->amount }} Руб.</small>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
</main>
@endsection
