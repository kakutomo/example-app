@props(['tweets'=>[]])
<div class="bg-white rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach ($tweets as $tweet)
        <li class="border-b last:border-b-0 border-red-200 p-4 flex items-start justify-bettween">
            <div>
                <span class="inline-block rounded-full text-red-600 bg-green-100 px-2 py-1 text-xs mb-2 ">
                    {{$tweet->user->name}}
                </span>
                <p class="text-gray-600">{!! nl2br(e($tweet->content))!!}</p>
            </div>
            <div></div>
        </li>
            
        @endforeach
    </ul>
</div>