<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Club;
use App\Game;
use App\User;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
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

    public function add(Game $game, Question $question)
    {
        // dd($game->id);
        return view('dashboard.games.betting_options.answers.add', compact('question', 'game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'bet_rate' => 'required'
        ]);

        $gameStore = Answer::create([
            'question_id' =>  $request->input('question_id'),
            'answer' => $request->input('answer'),
            'bet_rate' => $request->input('bet_rate'),
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer is not Added!';
        if ($gameStore) {
            $msg1 = 'message';
            $msg2 = 'Answer is Added!';
        }

        return Redirect::route('admin.games.bet', [$request->game_id])->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($game_id, Answer $answer)
    {
        return view('dashboard.games.betting_options.answers.edit', compact('game_id', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        // dd($request);

        $updatingAnswer = Answer::where('id', $request->answer_id)->first();
        if ($updatingAnswer) {
            $updatingAnswer->update([
                'answer' =>  $request->input('answer'),
                'bet_rate' => $request->input('bet_rate'),
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer is not Updated!';
        if ($updatingAnswer) {
            $msg1 = 'message';
            $msg2 = 'Answer is Updated!';
        }

        return Redirect::route('admin.games.bet', [$request->game_id])->with($msg1, $msg2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $deleteAns = DB::table('answers')->where('id', $answer->id)->delete();
        if ($deleteAns) {
            return back()->with('message', 'Answer Deleted!');
        }

        return back()->with('error', 'Answer is not sDeleted!');
    }

    public function status($game_id, $ans_id, $code)
    {
        // dd($ans_id);

        $status = DB::table('answers')
            ->where('id', '=', $ans_id)
            ->pluck('status');
        $status = $status[0] ?? null;

        $state = $status;

        if ($code == 1) {
            if ($status == 'active') {
                $state = 'inactive';
            } else if ($status == 'inactive') {
                $state = 'active';
            }
        }


        $updatingAns = Answer::where('id', $ans_id)->first();
        if ($updatingAns) {
            $updatingAns->update([
                'status' => $state,
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Answer Status is not Changes!';
        if ($updatingAns) {
            $msg1 = 'message';
            $msg2 = 'Answer Status Changes!';
        }

        return Redirect::route('admin.games.bet', [$game_id])->with($msg1, $msg2);
    }

    public function result(Question $question, Answer $answer)
    {
        $winedID = $answer->id;                                         # one answer will be winner | QUESTION
        $failedIDs = Answer::where('question_id', $question->id)
            ->where('id', '!=', $answer->id)->pluck('id')->toArray();   # multiple answer can be looser | QUESTION



        # CHANGE RESULT OF CORRECT ANSWER TO WIN
        $UpdateAns = Answer::where('id', $winedID)->first();
        if ($UpdateAns) {
            $UpdateAns->update([
                'result' => 'winned',
            ]);
        }

        # CHANGE RESULT OF INCORRECT ANSWER TO LOSS
        foreach ($failedIDs as $fail) {
            $UpdateAns = Answer::where('id', $fail)->first();
            if ($UpdateAns) {
                $UpdateAns->update([
                    'result' => 'lossed',
                ]);
            }
        }

        # Finds the Bet which is winner and whose are looser
        $winBets = Bet::where('answer_id', $winedID)->get();            # All the bets with correct ans
        $lossBets = Bet::whereIn('answer_id', $failedIDs)->get();       # All the bets with incorrect ans


        # SEND PRICE MONEY TO WINNER USERS, CLUBS AND SPONSORS
        foreach ($winBets as $winBet) {

            # CHANGE STATUS OF A BET TO WINNER
            $UpdateBet = Bet::where('id', $winBet->id)->first();
            if ($UpdateBet) {
                $UpdateBet->update([
                    'status' => 'win',
                ]);
            }

            #USER WHO PLACE BET
            $user = User::where('id', $winBet->bet_by)->first();

            # CLUB IN WHICH THE USER BELONGS TO
            $clubID = $user->club_id;
            $club = Club::where('id', $clubID)->first();

            # UPDATE USER
            $PrevAmount = User::where('id', $winBet->bet_by)->pluck('credits');
            $PrevLockAmount = User::where('id', $winBet->bet_by)->pluck('lock_credits');

            $updatingUserAccount = User::where('id', $winBet->bet_by)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'credits' => $PrevAmount[0] + $winBet->return_amount,
                    'lock_credits' => $PrevLockAmount[0] - $winBet->amount
                ]);
            }

            # UPDATE CLUB
            $clubCredits = Club::where('id', $club->id)->pluck('balance');
            $updatingClubAccount = User::where('id', $winBet->bet_by)->first();
            if ($updatingClubAccount) {
                $updatingClubAccount->update([
                    'balance' => $clubCredits[0] + $winBet->club_fee,
                ]);
            }

            # MINUS FROM SUPER ADMIN ACCOUNT
            $superAdmin = User::whereHas(
                'role',
                function ($q) {
                    $q->where('name', 'super_admin');
                }
            )->get();
            $superAdmin = $superAdmin[0];

            $BANK = User::where('id', $superAdmin->id)->pluck('credits');

            $SuperAdminUser = User::where('id', $winBet->bet_by)->first();
            if ($SuperAdminUser) {
                $SuperAdminUser->update([
                    'credits' => $BANK[0] - (($winBet->return_amount - $winBet->amount) + $winBet->club_fee),
                ]);
            }
        }


        # RETURN MONEY FROM LOOSER USERS AND SEND THOSE TO SUPER ADMIN ACCOUNT

        foreach ($lossBets as $lossBet) {

            # CHANGE STATUS OF A BET TO WINNER
            $UpdateBet = Bet::where('id', $lossBet->id)->first();
            if ($UpdateBet) {
                $UpdateBet->update([
                    'status' => 'loss',
                ]);
            }

            #USER WHO PLACE BET
            $user = User::where('id', $lossBet->bet_by)->first();

            # UPDATE USER
            $PrevLockAmount = User::where('id', $lossBet->bet_by)->pluck('lock_credits');

            $updatingUserAccount = User::where('id', $lossBet->bet_by)->first();
            if ($updatingUserAccount) {
                $updatingUserAccount->update([
                    'lock_credits' => $PrevLockAmount[0] - $lossBet->amount
                ]);
            }

            # Add to Admin Account
            $superAdmin = User::whereHas(
                'role',
                function ($q) {
                    $q->where('name', 'super_admin');
                }
            )->get();
            $superAdmin = $superAdmin[0];

            $BANK = User::where('id', $superAdmin->id)->pluck('credits');

            $SuperAdminUser = User::where('id', $winBet->bet_by)->first();
            if ($SuperAdminUser) {
                $SuperAdminUser->update([
                    'credits' => $BANK[0] + $lossBet->amount
                ]);
            }
        }


        # CUSTOM ALERT

        $msg1 = 'message';
        $msg2 = 'Winner and Loser published!!!';

        return back()->with($msg1, $msg2);
    }
}
