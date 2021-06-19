@extends('layouts.application')

@section('content')
    <h1>Among Tusk</h1>
    <p>「Among us」の縛りプレイのお題を選べるサイトです。</p>
    <p>現在 {{ $taskCount }} 種類の縛りが登録されています。</p>
    <a href="{{ route('task') }}">自分の縛りを選択する</a>
@endsection
