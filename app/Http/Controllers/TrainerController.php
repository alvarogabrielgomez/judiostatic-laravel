<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use judiostatic\Trainer;
use judiostatic\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $trainers = Trainer::all();

        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {

        return view('Trainers.create');
    }

    public function store(StoreTrainerRequest $request) // Por default lleva un Request normal
    {
        // $validateData = $request->validate([       // Esto se puede hacer para validar sin usar el StoreTrainerRequest
        //     'name' => 'required|max 10',
        //     'avatar' => 'required|image',
        //     'slug' => 'required'
        // ]);
        
        $trainer = new Trainer();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $trainer->avatar = $name;
        }
        $trainer->name = $request->input('name');
        $trainer->description = $request->input('description');
        $trainer->slug = Str_slug($request->input('name'));
        $trainer->save();
        return redirect()->route('trainers.index')->with('status', 'Created');;

        // return $request->input('name');
        // return $request->all();
    }


    public function show($slug)
    {
        //se puede hacer implicit binding con public function show(Trainer $trainer)

        //$trainer = Trainer::find($id);

        $trainer = Trainer::where('slug', '=', $slug)->firstOrFail();
        return view('trainers.show', compact('trainer'));
    }


    public function edit($slug)
    {
        //se puede hacer implicit binding con public function edit(Trainer $trainer)

        $trainer = Trainer::where('slug', '=', $slug)->firstOrFail();
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $slug)
    {
        //se puede hacer implicit binding con public function update(Trainer $trainer)
        $trainer = Trainer::where('slug', '=', $slug)->firstOrFail();

        //$trainer->fill($request->all());
        $trainer->fill($request->except('avatar'));

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $trainer->avatar = $name;
        }

        $trainer->save();
        // show pide un parametro mas
        return redirect()->route('trainers.show', [$trainer])->with('status', 'Updated');
    }

    public function destroy($slug)
    {
        $trainer = Trainer::where('slug', '=', $slug)->firstOrFail();
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();

        return redirect()->route('trainers.index')->with('status', 'Deleted'); // se pasa por session
       // return redirect()->route('trainers.index', ['delete' => 'success']); // Se ve en la barra
    }
}
