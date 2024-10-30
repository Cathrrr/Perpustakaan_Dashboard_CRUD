<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        //get book
        $book = Book::latest()->paginate(5);
        //render view with posts
        return view('book.index', compact('book'));
    }
    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'images' => 'required',
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required'
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagesName = time() . '_' . $images->getClientOriginalName();
            $images->move(public_path('public/images'), $imagesName);
        }

        //fungsi Simpan Data ke dalam Database
        Book::create([
            'images' => $imagesName,
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages
        ]);
        try {
            return redirect()->route('book.index');
        } catch (Exception $e) {
            return redirect()->route('book.index');
        }
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        //validate form
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required'
        ]);

        if ($request->hasFile('images')) {
            if ($book->images && file_exists(public_path('public/images/' . $book->images))) {
                unlink(public_path('public/images/' . $book->images));
            }

            $images = $request->file('images');
            $imagesName = time() . '_' . $images->getClientOriginalName();
            $images->move(public_path('public/images'), $imagesName);

            $book->images = $imagesName;
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages
        ]);
        return redirect()->route('book.index')->with([
            'success' => 'Data
        Berhasil Diubah!'
        ]);
    }
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book->images && file_exists(public_path('public/images/' . $book->images))) {
            unlink(public_path('public/images/' . $book->images));
        }
        $book->delete();
        return redirect()->route('book.index')->with([
            'success' => 'Data
        Berhasil Dihapus!'
        ]);
    }
}

