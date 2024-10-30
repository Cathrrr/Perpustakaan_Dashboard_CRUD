<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BookingsController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    use ValidatesRequests;
    public function index()
    {
        $bookings = Bookings::latest()->paginate(5);
        //render view with posts
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $book = Book::all();
        return view('bookings.create', compact('book'));
    }

    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'id_book' => 'required',
            'class' => 'required',
            'price' => 'required'
        ]);
        //fungsi Simpan Data ke dalam Database
        Bookings::create([
            'id_book' => $request->id_book,
            'class' => $request->class,
            'price' => $request->price
        ]);
        try {
            return redirect()->route('bookings.index');
        } catch (Exception $e) {
            return redirect()->route('bookings.index');
        }
    }

    public function edit($id)
    {
        $bookings = Bookings::find($id);
        $book = Book::all();
        return view('bookings.edit', compact('bookings', 'book'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        //validate form
        $this->validate($request, [
            'id_book' => 'required',
            'class' => 'required',
            'price' => 'required'
        ]);

        $bookings = Bookings::find($id);
        $bookings->update([
            'id_book' => $request->id_book,
            'class' => $request->class,
            'price' => $request->price
        ]);

        return redirect()->route('bookings.index')->with([
            'success' => 'Data
        Berhasil Diubah!'
        ]);
    }

    public function destroy($id)
    {
        $bookings = Bookings::find($id);
        $bookings->delete();
        return redirect()->route('bookings.index')->with([
            'success' => 'Data
        Berhasil Dihapus!'
        ]);
    }
}

