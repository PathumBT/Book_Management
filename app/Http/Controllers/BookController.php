<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use App\Models\BookCate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function dashboard()
    {
        $categories = BookCate::all();
        $bookCount = Book::count();
        $userCount = User::count();
        $categorieCount = BookCate::count();
        $books =  Book::all();
        $user = User::all();
        return view('dashboard', compact('categories', 'books', 'user', 'bookCount', 'userCount', 'categorieCount'));
    }

    //view book manage page
    public function view_book_manage()
    {
        $categories = BookCate::all();
        $books =  Book::all();
        $user = User::all();
        return view('book_manage', compact('categories', 'books', 'user'));
    }

    //create book with category
    public function add_bookdetails(Request $request)
    {
        $request->validate([
            'title' => 'required|string|required',
            'author' => 'required|string|required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);


        $book = new Book([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'book_category_id' => $request->input('category'),
        ]);

        $book->save();

        $request->session()->flash('success', 'Book added successfully.');

        return back();
    }

    //delete book
    public function deleteBook(Request $request, $id)
    {
        try {
            $response = Book::find($id);
            $response->delete();

            $request->session()->flash('delete', 'Book DELETED.');
            return back();
        } catch (\Exception $error) {
            $request->session()->flash('Something goes wrong. Please try again');
            return back();
        }
    }

    //edit book
    public function editBook($id)
    {
        $categories = BookCate::all();
        $book = Book::find($id);
        return view('edit_book', compact('categories', 'book'));
    }

    //update book
    public function update_book(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer',
        ]);

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->stock = $request->input('stock');
        $book->book_category_id = $request->input('category');
        $book->save();

        $request->session()->flash('success', 'Book updated successfully.');

        return redirect()->route('book_manage');
    }

    public function bookIssued()
    {
        $customers = User::where('role' , 0,)->get();
        $books = Book::get();
        $selectedCategory = request()->input('category_id');
        $books = $selectedCategory ? Book::where('category_id', $selectedCategory)->get() : Book::all();

        // book user latest 25 records
        $book_users = DB::table('book_users')
            ->join('books', 'book_users.book_id', '=', 'books.id')
            ->join('users', 'book_users.user_id', '=', 'users.id')
            ->select('book_users.*', 'books.title', 'users.name')
            ->where('book_users.returned', false)
            ->orderBy('book_users.id', 'desc')
            ->limit(25)
            ->get();

        $user = User::all();

        return view('bookIssued', compact('customers' ,'books'));
    }

    public function book_exchange()
    {
        $categories = BookCate::all();
        $selectedCategory = request()->input('category_id');
        $books = $selectedCategory ? Book::where('category_id', $selectedCategory)->get() : Book::all();

        // book user latest 25 records
        $book_users = DB::table('book_users')
            ->join('books', 'book_users.book_id', '=', 'books.id')
            ->join('users', 'book_users.user_id', '=', 'users.id')
            ->select('book_users.*', 'books.title', 'users.name')
            ->where('book_users.returned', false)
            ->orderBy('book_users.id', 'desc')
            ->limit(25)
            ->get();

        $user = User::all();

        return view('bookBorrow', compact('categories', 'books', 'user', 'book_users'));
    }

    //issue book
    public function issueBook(Request $request, $user_id, $book_id , $nic_id)
    {   
        try {
            
            $book = Book::find($book_id);
            $user = User::where('id', $user_id)
            ->orWhere('nic', $nic_id)
            ->first();

            if (!$user) {
                return response()->json(['error' => 'User not found.'], 404);
            }

            if (!$book) {
                return response()->json(['error' => 'Book not found.'], 404);
            }

            if ($book->stock > 0) {
                $user->books()->attach($book, ['issued_at' => now()]);
                $book->decrement('stock');

                return response()->json(['success' => 'Book issued successfully.'], 200);
            } else {
                return response()->json(['error' => 'Book out of stock.'], 400);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }


    public function returnBook(Request $request, $return_id)
    {
        try {
            $book_users = BookUser::find($return_id);
            if (!$book_users) {
                return back()->with('error', 'Book not found.');
            }

            if ($book_users->returned) {
                return back()->with('error', 'Book already returned.');
            }

            $book = Book::find($book_users->book_id);
            if (!$book) {
                return back()->with('error', 'Book not found.');
            }

            $book->increment('stock');

            $book_users->returned = true;
            $book_users->returned_at = now();
            $book_users->save();

            return back()->with('success', 'Book returned successfully.');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function userData()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function bookData($book_id)
    {
        $book = Book::find($book_id);
        return response()->json($book);
    }

    public function showIssueForm(User $user, Book $book)
    {
        return view('issue_return', compact('user', 'book'));
    }

    public function showReturnForm(User $user, Book $book)
    {
        return view('issue_return', compact('user', 'book'));
    }
}
