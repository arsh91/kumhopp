<h3>Hi, admin</h3>
<br />
<p>New Job is created with title :- <span style="color:red;"> <b>{{$job_name}}</b></span> by '{{$user_name}}'.</p>
<p>Please click this link to view the job in detail: <a href="{{url('/jobs', [$job_id])}}">{{$job_name}}</a></p>