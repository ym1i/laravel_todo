<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Folder;
use App\Http\Requests\CreateFolder;
use App\Http\Requests\EditFolder;

class FolderController extends Controller {
    public function create() {
        $folders = Folder::all();

        return Inertia::render('Folders/Create', [
            'folders' => $folders,
        ]);
    }

    public function store(CreateFolder $request) {
        $folder = new Folder();
        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id
        ]);
    }

    public function edit(int $id) {
        $folders = Folder::all();
        $folder = Folder::find($id);

        return Inertia::render('Folders/Edit', [
            'folders' => $folders,
            'folder' => $folder,
            'folderId' => $folder->id,
            'folderTitle' => $folder->title
        ]);
    }

    public function update(EditFolder $request, int $id) {
        $folder = Folder::find($id);
        $folder->title = $request->title;
        $folder->save();
        // dd($request);

        return redirect()->route('tasks.index', [
            'id' => $folder->id
        ]);
    }

    public function delete(int $id) {
        $folders = Folder::all();
        $folder = Folder::find($id);

        return Inertia::render('Folders/Delete', [
            'folders' => $folders,
            'folder' => $folder
        ]);
    }

    public function destroy(int $id) {
        $folder = Folder::find($id);
        $folder->tasks()->delete();
        $folder->delete();

        $folder = Folder::first();

        return redirect()->route('tasks.index', [
            'id' => $folder->id
        ]);
    }
}