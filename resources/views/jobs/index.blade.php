<x-layout>
    <h1>Available Jobs</h1>
    
    <ul>
        @forelse($jobs as $job)
            <li class="mt-4">
                <a href="{{route('jobs.show', $job->id)}}">
                    <strong>{{$job->title}}</strong>
                </a>
                <p>{{$job->description}}</p>
            </li>
            @empty
            <li>No jobs availble</li>
        @endforelse
    </ul>
</x-layout>