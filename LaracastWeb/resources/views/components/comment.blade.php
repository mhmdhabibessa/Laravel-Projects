
@props(['comment'])

   
<x-panel>
<article class="flex bg-gray-100 p-6 border border-gray-300 rounded-xl space-x-4">
                        <div>
                            <img src="https://i.pravatar.cc/200?u={{$comment-> user_id}}"  class="rounded-xl flex-shrink-0 " alt="image">
                        </div>
                        <div>
                            <header> 
                                <h3 class="font-bold"> {{$comment -> author -> username }}</h3>
                                <p class="text-xs">  Posted at <time> {{$comment ->created_at -> diffForHumans() }} </time> </p>
                            </header>
                            <p> {{$comment -> body}} </p>
                        </div>
                    </article>
</x-panel>
