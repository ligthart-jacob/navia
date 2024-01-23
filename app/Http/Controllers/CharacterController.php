<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    // Show all characters
    public function index() {
        return view('characters.index', [
            'characters' => Character::join('series', 'characters.series_id', '=', 'series.id')
            ->select('characters.*', 'series.name as series', 'series.slug')
            ->filter(request(['series', 'search', 'sort', 'order']))->get(),
            'series' => Series::orderBy('name')->get(),
            'current' => request(["series"][0]) ?? '',
            'sort' => request(["sort"][0]) ?? 'Name',
            'order' => request(["order"][0]) ?? 0
        ]);
    }

    // Show single character
    public function show(Character $character) {
        return view('characters.show', [
            'character' => $character
        ]);
    }

    public function create()
    {
        return view('characters.create');
    }

    // Store character data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'series' => 'required'
        ]);

        if ($request->has('image'))
        {
            $filename = basename(explode('?', $request->image)[0]);
            $source = imagecreatefromwebp($request->image);
            $result = imagecreatetruecolor(225, 350);
            imagecopyresized($result, $source, 0, 0, 1, 1, 225, 350, 223, 348);
            imagepng($result, "./cards/$filename");
            $formFields["image"] = "/cards/$filename";   
        }

        $formFields["series_id"] = Series::where('slug', $formFields["series"])->first()->id;
        unset($formFields["series"]);

        Character::create($formFields);

        return redirect('/');
    }

    public function toggle(Character $character)
    {
        $character->obtained = !$character->obtained;
        $character->save();
        return redirect('/');
    }

    public function edit(Request $request, Character $character)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'series' => 'required'
        ]);

        if ($request->has('image'))
        {
            if ($request->currentImage != $request->image)
            {
                unlink('.' . $request->currentImage);
                $filename = basename(explode('?', $request->image)[0]);
                $source = imagecreatefromwebp($request->image);
                $result = imagecreatetruecolor(225, 350);
                imagecopyresized($result, $source, 0, 0, 1, 1, 225, 350, 223, 348);
                imagepng($result, "./cards/$filename");
                $formFields["image"] = "/cards/$filename";
            }
        }

        $formFields["series_id"] = Series::where('slug', $formFields["series"])->first()->id;
        unset($formFields["series"]);

        $character->update($formFields);

        return redirect('/');
    }

    public function destroy(Character $character)
    {
        // dd(getcwd());
        if (file_exists('.' . $character->image))
            unlink('.' . $character->image);
        $character->delete();
        return redirect('/');
    }
}
