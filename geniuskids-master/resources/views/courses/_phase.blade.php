<div class="w-1/2 md:w-1/3">
    <div class="h-full p-2
        @if($loop->index === 0) bg-red-200
        @elseif($loop->index === 1) bg-green-200
        @elseif($loop->index === 2) bg-pink-200
        @elseif($loop->index === 3) bg-orange-200
        @elseif($loop->index === 4) bg-purple-200
        @else bg-blue-200
        @endif
        ">
        <p class="text-primary text-lg font-bold text-center">
            {{ $key }}
        </p>
        <p>
            {{ $value }}
        </p>
    </div>
</div>


