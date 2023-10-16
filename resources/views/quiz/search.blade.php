@extends('layout.backend')
@section('content')
<div class="container">
    <br>
    <div class="row">
        @foreach($tbl_quizzes as $quiz)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Title: {{ $quiz->title }}</h4>
                    <p>Description: {{ $quiz->description }}</p>
                    <p><strong>Date: </strong> {{ $quiz->date }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    {{ $tbl_quizzes->withQueryString()->links('pagination::bootstrap-5');}}
</div>
@endsection