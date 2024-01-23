<section id="overlay" data-show="0" class="z-20 justify-center items-center flex data-[show='0']:hidden fixed inset-0 w-screen h-screen bg-opacity-70 bg-gray-900">
    <form id="editCharacter" data-show="0" class="flex data-[show='0']:hidden flex-col gap-6 p-8 rounded-lg bg-gradient-to-b from-body-dark to-body-blue" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="currentImage">
        <h1 class="text-white font-bold text-2xl mb-3">Update Character</h1>
        <div class="flex flex-col-reverse">
            <input
            class="peer border border-grey w-76 text-white bg-transparent font-rob py-2 px-3 rounded-r-lg rounded-bl-lg font-base focus:outline-none focus:border-slate-red"
            name="name" id="characterName" type="text">
            <label class="peer-focus:text-slate-red text-white text-sm font-rob small-caps" for="characterName">name</label>
        </div>
        <div class="flex flex-col-reverse">
            <div class="custom-select">
                <input type="hidden" name="series">
                <div class="head my-custom-style">
                    loading...
                </div>
                <ul class="body">
                @foreach ($series as $s)
                    <li @if ($s->slug == $current) data-selected @endif data-value="{{$s->slug}}">{{$s->name}}</li>
                @endforeach
                </ul>
            </div>
            <label class="text-white text-sm font-rob small-caps" for="characterName">name</label>
        </div>
        <div class="flex flex-col-reverse">
            <input
            class="peer border border-grey w-76 text-white bg-transparent font-rob py-2 px-3 rounded-r-lg rounded-bl-lg font-base focus:outline-none focus:border-slate-red"
            id="characterName" name="image" type="text">
            <label class="peer-focus:text-slate-red text-white text-sm font-rob small-caps" for="characterName">image</label>
        </div>
        <div class="flex justify-between">
            <button type="button" onclick="closeEdit('editCharacter')" class="font-medium py-2 px-5 rounded-full font-base text-white self-end bg-gradient-to-b from-slate-crimson to-crimson font-rob small-caps">close</button>
            <button type="submit" class="font-medium py-2 px-5 rounded-full font-base text-white self-end bg-gradient-to-b from-slate-crimson to-crimson font-rob small-caps">update</button>
        </div>
    </form>
</section>