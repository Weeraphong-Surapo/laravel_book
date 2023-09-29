<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ListSale;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.allbook', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addbook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book_name = $request->input('book_name');
        $book_price = $request->input('book_price');
        if ($request->hasFile('book_img')) {
            $file = $request->file('book_img');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/books'), $fileName);
            $filePath = 'books/' . $fileName;
        }
        $book = new Book();
        $book->book_name = $book_name;
        $book->book_price = $book_price;
        $book->book_img = $filePath;
        $book->book_qty = $request->input('book_qty');
        $book->save();
        return to_route('allbook.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('admin.editbook', compact('book'));
    }

    /**z
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->book_name = $request->get('book_name');
        $book->book_price = $request->get('book_price');
        $book->book_qty = $request->get('book_qty');
        if ($request->hasFile('book_img')) {
            $oldFilePath = $book->book_img;
            unlink(public_path($oldFilePath));

            $file = $request->file('book_img');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/books'), $fileName);
            $filePath = 'books/' . $fileName;
            $book->book_img = $filePath;
        }
        $book->save();

        return to_route('allbook.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return back();
    }

    public function toggle(Request $request, $id)
    {
        $list = ListSale::find($id);
        if ($request->input('status') == 'no') {
            $list->status = 999;
        } else {
            $list->status = 1;
        }
        $list->save();
        return back();
    }
}
