@extends('layouts.app')

@section('content')
<main>
  <div class="container">
    <div class="col-md-12 mx-auto">

        <div class="row g-5"> 
          <div class="col-md-12">
            <h2>Отклик от пользователя</h2>
            <p>{!! $orders->message !!}</p>
          </div>
        </div>
 
    </div>
  </div>
</main>
@endsection
 