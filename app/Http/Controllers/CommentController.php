<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\subscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => ['required'],
        ]);

        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        $subscribers = $blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->id());
        
        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber->email)->queue(new subscriberMail($blog));
        });
        
        return redirect("/blogs/$blog->slug");
    }

    public function destroy(Comment $comment)
    {
        $comment->destroy($comment->id);

        return back();
    }
}
