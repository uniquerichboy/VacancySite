@extends('layouts.app')

@section('content')
<main>
  <div class="container">
  <h4 class="mb-3">Все отклики</h4>
    @foreach($orders as $ord)
    <div class="col-md-12 list-group mb-2">
      <a href="{{ route('message.id', ['id' => $ord['id']]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">{{ $ord['title'] }}</h6>
            <p class="mb-0 opacity-75">{{ $ord['username'] }}</p>
          </div>
        </div>
      </a>  
    </div>
    @endforeach
  </div>
</main>
@endsection
 