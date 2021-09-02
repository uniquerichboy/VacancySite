@extends('layouts.app')

@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://www.remote.io/img/hero-images/1-blue.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="400" height="400" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Ищешь работу? Давай мы поможем тебе в этом!</h1>
        <p class="lead">Мы плафтрома с множеством вакансий, найдёшь любую работу по душе.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <form action="{{ route('search') }}" method="get" class="d-flex">
            <input type="text" name="title" placeholder="Backend Developer" class="form-control col-md-12 mr-3 mt-1">
            <button type="submit" class="btn btn-primary btn-lg px-4 me-md-2">Найти</button>
        </form>
        </div>
      </div>
    </div>
  </div> 
 
<main>
  <div class="container" id="vacancy">
  <h4 class="mb-3">Все вакансии</h4>
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
    {{ $vacancy->links() }}
  </div>
</main>
@endsection
