@props(['character'])

<div class="group font-os relative shadow-lg">
    <div class="hidden p-4 z-10 absolute rounded-md w-card bg-gradient-to-t from-dark-blue h-card group-hover:flex flex-end flex-col justify-between" onmouseup="showEdit(event, 'editCharacter', '{{$character->uuid}}')">
    <div class="flex justify-between">
        <form method="POST" action="/characters/{{$character->uuid}}">
            @csrf
            @method('PATCH')
            <button class="font-fa bg-white shadow-md hover:text-white hover:bg-slate-red w-10 h-10 rounded-full text-slate-red"><i class="fa-solid fa-heart"></i></button>            
        </form>
        <form method="POST" action="/characters/{{$character->uuid}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="font-fa bg-white shadow-md hover:text-white hover:bg-slate-red w-10 h-10 rounded-full text-slate-red"><i class="fa-solid fa-ban"></i></button>
        </form>
    </div>
    <div class="flex flex-col">
        <h3 class="text-lg text-white">{{$character->name}}</h3>
        <a class="text-xs text-white hover:underline font-light" href="/?series={{$character->slug}}">{{$character->series ?? 'none'}}</a>
    </div>
    </div>
    <img data-obtained="{{$character->obtained}}" class="rounded-md data-[obtained='0']:grayscale" src="{{$character->image ?? "/images/default.png"}}" />
</div>