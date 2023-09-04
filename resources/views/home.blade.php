@extends('layouts.mainLayout')
@section('title', 'Home')


<!-- dibutuhkan endsection karena memiliki lebih dari satu baris-simple -->
@section('content')
  <div class="container mb-5">
  <h1>Ini halaman Home</h1>
  <h2>Selamat datang {{$name}}. Anda adalah {{$role}}</h2>

  @if ($role == 'Admin')
      <a href="#">ke halaman admin</a>
  @elseif ($role == "Staff")
      <a href="#">ke halaman gudang</a>
  @else
      <a href=""#>ke halaman whatever</a>
  @endif

  <!-- Unless -->
  <!-- Used of our statement false then will show the following data -->
  @unless ($role == 'Admin')
      <p>anda bukan admin</p>
  @endunless


  <!-- True if role variable exists -->
  @isset ($role)
      <p>Role telah diset</p>
  @endisset

  <!-- True if role variable empty or does not exist -->
  @empty ($role)
      <p>Role kosong</p>
  @endempty



  <br>
  <br>
  <br>
  <br>
  <h3>Switch Statement</h3>
  @switch($role)
    @case ('Admin')
      <p>Anda adalah admin</p>
      @break
    @case ('Staff')
      <p>Anda adalah staff</p>
      @break
    @default
      <p>Anda adalah apa?</p>
  @endswitch



  <br>
  <br>
  <br>
  <br>
  <h3>For Loop Statement</h3>
  @for ($i = 1; $i < 10; $i++)
    <script>
      console.log('{{$i}}');
    </script>
  @endfor

  @foreach ($buah as $item)
    <p>{{$item}}</p>
  @endforeach


  <table class="table">
    <tr>
      <th>Nomor</th>
      <th>Nama Buah</th>
    </tr>
    @foreach ($buah as $item)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$item}}</td>
    </tr>
      @endforeach
    <!-- @for($i  = 1; $i <= count($buah); $i++)
    <tr>
      <td>{{$i}}</td>
      <td>{{$buah[$i-1]}}</td>
    </tr>
    @endfor -->

  </table>
  </div>
@endsection