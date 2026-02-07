<h2>
    {{ $job->title }} has been posted successfully!
</h2>

<p>
    Salary: {{ $job->salary }}
</p>

<p>
    <a href={{ url('/jobs/' . $job->id) }}>View Job</a>
</p>
