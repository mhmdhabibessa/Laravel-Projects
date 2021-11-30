
@props(['trigger'])

<div x-data="{show: false }" @click.away ="show =false" >

        <div @click="show = !show"> 

            {{$trigger}}
        </div>

<div x-show="show" class="w-full z-50 " style="display:none" >
  
        {{$slot}}
</div>


</div>
