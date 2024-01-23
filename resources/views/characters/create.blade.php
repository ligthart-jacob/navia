<x-layout>
  <form class="flex flex-col" method="POST" action="/characters">
    @csrf
    <input type="text" name="name" placeholder="name">
    @error('name')
        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
    @enderror
    <input type="text" name="series" placeholder="series">
    @error('series')
        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
    @enderror
    <button type="submit">Add</button>
  </form>
</x-layout>