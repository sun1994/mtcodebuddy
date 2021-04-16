<!-- Admin Dashboard file -->
<x-header />
<h3 style="text-align: center;">Admin's Dashboard</h3>

@if(isset($message))
<h2  style="color: green;">{{$message}}</h2>
@endif

<button type="button"> Add Category </button>