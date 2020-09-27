@php
$active='autoStack';
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
        <a href="{{route('admin.auto_stack.stack_options.question.add',[$autoStackCategory->id])}}" name="add" class="btn btn-primary ">
            <span class="material-icons">
            add_circle_outline
            </span>
            Add Question
        </a>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Stack Options ({{ $autoStackCategory->id }})</h4>
            <p style="color:burlywood;" class="card-category">
                Category Name: {{ $autoStackCategory->name }}
            </p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <!-- Nested Table -->
                @foreach ($questions as $question)
                @if ($autoStackCategory->id == $question->auto_stack_cat_id)
                <div class="col-md-12">
                    <div class="card card-plain">
                        @if($question->is_active==1)
                        <div class="card-header card-header-info">
                        @else
                        <div class="card-header card-header-danger">
                        @endif
                            <h4 style="color: black; font-weight:bold" class="card-title mt-0">
                                {{ $question->question}}
                                <a href="{{ route('admin.auto_stack.stack_options.question.status',[$autoStackCategory->id,$question->id,1]) }}" class="btn btn-outline-secondary bg-warning" style="float:right;backgounrd: #4267B2;">
                                    @if ($question->is_active==true)
                                    <i class="material-icons">check_circle</i>
                                    @else
                                    <i class="material-icons">airplanemode_inactive</i>
                                    @endif
                                </a>
                                <a href="{{ route('admin.auto_stack.stack_options.question.destroy',[$question->id]) }}" class="btn btn-outline-secondary bg-danger" style="float:right;backgounrd: #4267B2;">
                                    <i class="material-icons">delete</i> Question
                                </a>
                                <a href="{{ route('admin.auto_stack.stack_options.ques.answer.add',[$autoStackCategory->id,$question->id]) }}" class="btn btn-outline-secondary bg-success" style="float:right;backgounrd: #4267B2;">
                                    <span class="material-icons">
                                        add_circle_outline
                                    </span> Answer
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-plain">
                        <table class="table table-hover">
                            <thead class="">
                                <th class="td-actions text-center">
                                    Answer
                                </th>
                                <th class="td-actions text-center">
                                    Bet Rate
                                </th>
                                <th class="td-actions text-center">
                                    Action
                                </th>
                            </thead>
                            @foreach ($answers as $answer)
                            @if($question->id == $answer->question_id)
                            <tbody>
                                @if ($answer->status=='inactive')
                                <tr style="background: rgb(233, 128, 143)">
                                @elseif($answer->status=='active')
                                <tr style="background: rgb(143, 218, 153)">
                                @elseif($answer->status=='win')
                                <tr style="background: rgb(32, 199, 121)">
                                @elseif($answer->status=='loss')
                                <tr style="background: rgb(212, 7, 38)">
                                @endif
                                    <td class="td-actions text-center">
                                        {{$answer->answer}}
                                    </td>
                                    <td class="td-actions text-center">
                                        {{$answer->bet_rate}}
                                    </td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('admin.auto_stack.stack_options.ques.answer.edit',[$autoStackCategory->id,$answer->id]) }}" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                          </a>
                                        <a href="{{ route('admin.auto_stack.stack_options.ques.answer.destroy',[$answer->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif
                @endforeach
            <!-- Nested Table -->
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
