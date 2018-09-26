<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function getIndex() {
   		$posts = Post::orderBY('created_at', 'desc')->limit(4)->get();
   		return view('pages/welcome')->withPosts($posts);
   }

   public function getAbout() {
   		return view('pages/about');
   }

   public function getContact() {
   		return view('pages/contact');
   }


}
