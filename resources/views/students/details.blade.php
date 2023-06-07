@isset($message)
    
{{$message  }}
@endisset
{{$student->name}}
<br>
@foreach ($exams as $exam)
{{$exam->mark}}
@endforeach
<br>
@foreach ($quizzes as $quiz)
{{$quiz->mark}}
@endforeach
<br>
{{$count}}