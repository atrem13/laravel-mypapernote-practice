<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book.index')->with('books', $books);
    }


    public function import(Request $request)
    {
        if ($request->file('imported_file')) {
            Excel::import(new BooksImport(), request()->file('imported_file'));
            return back();
        }
    }


    public function export()
    {
        return Excel::download(new BooksExport(), 'books.xlsx');
    }
}
