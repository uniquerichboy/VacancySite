@extends('layouts.app')

@section('content')
<main>
  <div class="container">
    <div class="col-md-12 mx-auto p-3 py-md-5">

        <h1>{{ $vacancy->title }}</h1>

        <p class="fs-5 col-md-8">Адрес: {{ $vacancy->city }}</p>
        <b class="col-md-8">{{ $vacancy->amount }} Руб</b>

        <div class="mb-5 mt-3">
          <button href="#" class="btn btn-primary btn-lg px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Откликнуться</button>
        </div>

        <div class="row g-5 mt-5"> 
          <div class="col-md-6">
            <h2>Описание вакансии</h2>
            <p>{!! $vacancy->description !!}</p>
          </div>

          <div class="col-md-6">
            <h2>Контакты</h2>
            <ul class="icon-list"> 
              <li><a href="tel:{{ $vacancy->phone }}">{{ $vacancy->phone }}</a></li>
              <li><a href="https://t.me/" target="_blank">{{ $vacancy->telegram }}</a></li>
              @if($vacancy->vk !== null)
              <li><a href="{{ $vacancy->vk }}">{{ $vacancy->vk }}</a></li>
              @endif
            </ul>
          </div>
        </div>
 
    </div>
  </div>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="get" action="{{ route('send', ['id' => $vacancy->id]) }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Отклик на вакансию</h5>
      </div> 
      <div class="modal-body">
        <div class="col-md-12">
          <label for="message" class="form-label">Укажите свои контакты</label>
          <textarea class="form-control col-md-12" name="message" id="message" placeholder="Сопроводительное письмо"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
    </form>
  </div>
</div>
@endsection
