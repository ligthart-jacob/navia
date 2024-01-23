<!DOCTYPE html>
<html lang="en" class="font-rob">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <meta name="_token" content="{{ csrf_token() }}">
  <script defer src="{{asset('js/global.js')}}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'rob': 'Roboto'
          },
          colors: {
            'grey': '#ccc',
            'heading': '#111',
            'body-dark': '#222',
            'dark': '#333',
            'body-blue': '#201D2B',
            'slate-red': '#C86677',
            'crimson': '#AF4054',
            'slate-crimson': '#A95464',
            'light-gray': '#f0f0f0',
            'dark-blue': '#343A52',
          },
          width: {
            'half': '739px',
            '76': '304px',
            'card': '225px'
          },
          height: {
            'card': '350px'
          }
        }
      }
    }
  </script>
</head>
<body class="w-full overflow-x-hidden bg-fixed bg-gradient-to-b h-screen from-body-dark to-body-blue">
  <header class="w-screen bg-heading flex justify-center">
    <nav class="flex items-center gap-6 w-half my-5">
      <a href="./" class="text-white font-rob text-lg small-caps">home</a>
      <form class="ml-auto">
        <div class="flex py-2 flex-row-reverse px-5 items-center gap-4 bg-dark rounded-full">
          <input class="peer bg-transparent font-rob text-white focus:outline-none placeholder:text-gray-300 text-base" name="search" type="text" placeholder="Search...">
          <i class="fa-regular peer-focus:text-slate-red fa-magnifying-glass text-white"></i>
        </div>
      </form>
    </nav>
  </header>
  <main>
    {{$slot}}
  </main>
</body>
</html>