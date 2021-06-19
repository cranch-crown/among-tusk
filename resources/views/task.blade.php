@extends('layouts.application')
@section('content')
    <p>今回のあなたの縛りは</p>
    <p class="task-box">{{ $task->toString() }}</p>
    <p>です</p>

    <a href="{{ route('raffle') }}">再抽選する</a>
@endsection
