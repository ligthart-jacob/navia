@props(['sort', 'order'])
<section>
    <form class="flex mt-12 gap-6 m-auto w-half justify-end">
      <div class="flex flex-col-reverse justify-between">
        <select name="sort" onblur="this.form.submit()" class="bg-transparent w-24 border-b border-white appearance-none focus:outline-none b text-white" value="{{$sort}}" id="sortBy">
          <option class="text-black" @selected($sort == 'name')  value="name">Name</option>
          <option class="text-black" @selected($sort == 'created_at') value="created_at">Date</option>
        </select>
        <label class="text-white font-rob small-caps" for="sortBy">sort</label>
      </div>
      <div class="flex flex-col-reverse">
        <input type="hidden" name="order" value="{{$order ? 0 : 1}}">
        <button type="submit" onclick="this.form.submit()" class="font-medium mt-auto px-3 rounded-full font-base text-white self-end bg-gradient-to-b from-slate-crimson to-crimson font-rob small-caps">@if ($order != 0) ascending @else descending @endif</button>
        <label class="text-white font-rob small-caps" for="orderBy">order</label>
      </div>
    </form>
</section>
<section class="mt-6 flex m-auto w-half flex flex-wrap gap-8">
  {{$slot}}
</section>