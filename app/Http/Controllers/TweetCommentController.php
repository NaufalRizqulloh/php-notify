<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use App\Notifications\TweetComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id): RedirectResponse
    {
        $tweet = Tweet::find($id);

        $comment = Comment::create([
            'message' => request('message'),
            'user_id' => Auth::id(),
            'tweet_id' => $id,
        ]);

        $tweet->user->notify(new TweetComment($comment));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $commentId)
    {
        // dd(Comment::find($commentId));
        return view('comments.edit',[
            'comments' => Comment::find($commentId),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id, string $commentId)
    {
        dd($request->message);
        $comments = Comment::find($commentId);

        $comments ->message = $request->message;

        $comments ->save();

        return redirect()-> route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);

        $this->authorize('delete',$comments);

        $comments->delete();

        return redirect()->route('comments.index');
    }
}
