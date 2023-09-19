@foreach ($tasks as $task)
<form action="/api/task{{$task->id}}" method="post">
    {{csrf_field()}}
{{@method_field('GET')}}
<div class="form-group">
    <input type="submit" value="{{$task->title}}">
</div>
</form>
    
@endforeach