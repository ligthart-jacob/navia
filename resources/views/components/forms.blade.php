<section class="flex justify-between mt-16 w-half mx-auto">
  <form class="flex flex-col gap-6" method="POST" action="/characters">
    @csrf
    <h1 class="text-white font-bold text-2xl mb-3">Add Character</h1>
    <div class="flex flex-col-reverse">
      @error('name')
          <span class="small-caps text-crimson">* name is required</span>
      @enderror
      <input class="peer border border-grey w-76 text-white bg-transparent font-rob py-2 px-3 rounded-r-lg rounded-bl-lg font-base focus:outline-none focus:border-slate-red" name="name" id="characterName" type="text">
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
      <label class="text-white text-sm font-rob small-caps" for="characterSeries">series</label>
    </div>
    <div class="flex flex-col-reverse">
      @error('image')
          <span class="small-caps text-crimson">* image is required</span>
      @enderror
      <input class="peer border border-grey w-76 text-white bg-transparent font-rob py-2 px-3 rounded-r-lg rounded-bl-lg font-base focus:outline-none focus:border-slate-red" name="image" id="characterImage" type="text">
      <label class="peer-focus:text-slate-red text-white text-sm font-rob small-caps" for="characterImage">image</label>
    </div>
    <button type="submit" class="font-medium py-2 px-5 rounded-full font-base text-white self-end bg-gradient-to-b from-slate-crimson to-crimson font-rob small-caps">create</button>
  </form>
  <form class="flex h-auto flex-col gap-6" method="POST" action="/series">
    @csrf
    <h1 class="text-white font-bold text-2xl mb-3">Add Series</h1>
    <div class="flex flex-col-reverse">
      @error('seriesName')
          <span class="small-caps text-crimson">* name is required</span>
      @enderror
      <input class="peer border border-grey w-76 text-white bg-transparent font-rob py-2 px-3 rounded-r-lg rounded-bl-lg font-base focus:outline-none focus:border-slate-red" name="seriesName" id="seriesName" type="text">
      <label class="peer-focus:text-slate-red text-white text-sm font-rob small-caps" for="seriesName">name</label>
    </div>
    <button type="submit" class="font-medium mt-auto py-2 px-5 rounded-full font-base text-white self-end bg-gradient-to-b from-slate-crimson to-crimson font-rob small-caps">create</button>
  </form>
</section>