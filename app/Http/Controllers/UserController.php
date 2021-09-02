<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function processLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/');
        }

        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    /*public function index(){
        return view ('home', [
            'title' => 'Home',
            'body1' => 'Review: Arsenic for Tea',
            'quote1' => 'Hazel, this is serious. Mr. Curtis is not just ill. He has been poisoned!',
            'source1' => 'Daisy',
            'body2' => 'Review: The Long Way to a Small, Angry Planet',
            'quote2' => 'She was out in the open now. No bustling planets, no travel lanes,
                no sparkling orbiters. Just emptiness, horrible emptiness, filled with nothing
                but herself and the occasional rock.',
            'source2' => 'Day 128, GC Standard 306',
            'body3' => 'The Girl with All the Gifts',
            'quote3' => 'When there is nothing to do, and you cannot even move,',
            'quotecont' => 'time goes a lot more slowly.',
            'source3' => 'Chapter 10'
        ]);
    }

    public function author(){
        return view ('author', [
            'title' => 'Books by Author',
            'author1' => 'Akiyoshi Rikako',
            'author2' => 'Anggun Prameswari',
            'author3' => 'Becky Chambers',
            'author4' => 'Brahmanto Anindito',
            'author5' => 'Charlotte Bronte',
            'author6' => 'Diane Setterfield',
            'author7' => 'Isaac Marion',
            'author8' => 'J.K. Rowling',
            'author9' => 'Jane Austen',
            'author10' => 'Jenny Han'
        ]);
    }

    public function publisher(){
        return view ('publisher', [
            'title' => 'Books by Publisher',
            'publisher1' => 'Dutton Books',
            'publisher2' => 'Gramedia Pustaka Utama',
            'publisher3' => 'Little, Brown and Company',
            'publisher4' => 'Mizan Fantasi',
            'publisher5' => 'Penerbit Haru',
            'publisher6' => 'Scholastic Inc'
        ]);
    }

    public function about(){
        $title = "About";
        $body1 = "Years with Books merupakan sebuah website berupa review buku yang
        dibentuk tahun 2020 oleh beberapa pecinta buku. Selain bertujuan
        sebagai diary virtual tentang buku yang telah dibaca oleh
        para pecinta buku tersebut, website ini juga bertujuan untuk sharing
        terhadap teman-teman sekalian akan buku-buku yang mungkin akan teman-teman sukai.
        Hope you guys enjoy!";
        $body2 = "Years with Books is a website dedicated for book reviews made in
        2020 by us as book lovers. Aside from creating this website as book diary,
        we dearly hope that you as our readers can get several information about
        books that you guys can enjoy. Have a great time!";
        return view ('about', compact('title', 'body1', 'body2'));
    }

    public function contact(){
        $title = "Contact";
        $body1 = "Jika teman-teman mempunyai saran atau request buku yang ingin di-review,
        silahkan tinggalkan jejak di bawah ini ya. Terima kasih!";
        $body2 = "If you wanna leave suggestion or even book request, you can write them
        on the form below. Thank you!";
        $email = "Your Email";
        $message = "Suggestion or Request";
        return view ('contact', compact('title', 'body1', 'body2', 'email', 'message'));
    }

    public function tugas(){
        return view('tugas', [
            'title' => 'Tugas 3',
        ]);
    }

    public function comment(Request $request){
        $fruits = ['Pisang', 'Jeruk', 'Mangga'];
        $buah = $request->input('buah');
        
        if(in_array($buah, $fruits))
            session()->flash('message', 
            '<div class="alert alert-success role="alert">Buah <strong>'.$buah.'</strong> ditemukan</div>');
        elseif(!in_array($buah, $fruits))
            session()->flash('message', 
            '<div class="alert alert-danger role="alert">Buah <strong>'.$buah.'</strong> tidak ditemukan</div>');
        
        return redirect()->back();
    }*/
}
