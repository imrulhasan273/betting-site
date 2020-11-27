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
    public function better(Answer $answer)
    {
        // dd($answer->id);
        $betters = Bet::where('answer_id', $answer->id)
            ->where('status', '')->get();

        // dd($betters);
        return view('dashboard.better', compact('betters', 'answer'));
    }

    public function quest_change(Request $request)
    {
        $updatingQues = Question::where('id', $request->quest_id)->first();
        if ($updatingQues) {
            $updatingQues->update([
                'question' => $request->quest,
            ]);
        }

        // return response()->json($request);
        $data = [$request->quest_id, $request->quest];
        return response()->json($data);
    }

    public function changeBetRate(Request $request)
    {
        if (is_numeric($request->bet_rate) == false) {
            return response()->json("not_numeric");
        }
        $updatingAns = Answer::where('id', $request->ans_id)->first();
        if ($updatingAns) {
            $updatingAns->update([
                'bet_rate' => $request->bet_rate,
            ]);
        }

        // return response()->json($request);
        $data = [$request->ans_id, $request->bet_rate];
        return response()->json($data);
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
        // _____________________________________________________________________

        # START CHECK IF THE ANSWER HAS ALREADY BEEN PUBLISH
        if ($question->flag == 1) {
            return back()->with('error', 'This Question Has Already Been Published!!!');
        }
        # SET THE QUESTION FLAG == 1 FROM 0
        $UpdateQues = Question::where('id', $question->id)->first();
        if ($UpdateQues) {
            $UpdateQues->update([
                'flag' => 1,
            ]);
        }
        # END CHECK IF THE ANSWER HAS ALREADY BEEN PUBLISH



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

        # Finds the Bet which are winner and which are looser
        $winBets = Bet::where('answer_id', $winedID)->get();            # All the bets with the correct answer
        $lossBets = Bet::whereIn('answer_id', $failedIDs)->get();       # All the bets with incorrect answers


        # _________________________________________________________________________________

        # SEND PRICE MONEY TO WINNER USERS, CLUBS AND SPONSORS
        foreach ($winBets as $winBet) {

            # CHANGE STATUS OF A BET TO WINNER
            $UpdateBet = Bet::where('id', $winBet->id)->first();
            if ($UpdateBet) {
                $UpdateBet->update([
                    'status' => 'winner',
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

            # START UPDATE CLUB USER BALANCE___________________________@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            $clubCredits = Club::where('id', $club->id)->pluck('balance');
            $updatingClubAccount = Club::where('id', $club->id)->first();
            if ($updatingClubAccount) {
                $updatingClubAccount->update([
                    'balance' => $clubCredits[0] + $winBet->club_fee,
                ]);
            }
            # END UPDATE CLUB USER BALANCE___________________________


            # START UPDATE SPONSOR USER CREDITS___________________________
            $userr = User::where('id', $winBet->bet_by)->first();
            $SponsorID = $userr->ref[0]->id ?? null;
            $SPcommission = 0;

            # IF USER HAVE A SPONSOR
            $SPcredits = null;                                  ///initially
            $SPcommission = null;                               ///initially
            if ($SponsorID != null) {

                $SPcredits = User::where('id', $SponsorID)->pluck('credits');
                $SPcredits = $SPcredits[0];

                #-- -- COMISSION -- --
                # COMMISSION GET FETCH FORM BACKEND
                $percentage = DB::table('sponsor_commission')->first();
                $percentage = $percentage->commission ?? null;

                # $percentage = 0.001; //HARD CODING COMMISSION VALUE

                $SPcommission = ($winBet->return_amount * $percentage) / 100;

                $UpdateSponsor = User::where('id', $SponsorID)->first();
                if ($UpdateSponsor) {
                    $UpdateSponsor->update([
                        'credits' => $SPcredits + $SPcommission,
                    ]);
                }
            }
            # -- -- -- -- ADD NEW SPONSOR TRANSECTION -- -- -- --

            # END UPDATE SPONSOR USER CREDITS___________________________



            # MINUS FROM SUPER ADMIN ACCOUNT
            $superAdmin = User::whereHas(
                'role',
                function ($q) {
                    $q->where('name', 'super_admin');
                }
            )->get();
            $superAdmin = $superAdmin[0];

            $BANK = User::where('id', $superAdmin->id)->pluck('credits');

            $SuperAdminUser = User::where('id', $superAdmin->id)->first();
            if ($SuperAdminUser) {
                $SuperAdminUser->update([
                    'credits' => $BANK[0] - (($winBet->return_amount - $winBet->amount) + $winBet->club_fee + $SPcommission),
                ]);
            }

            $TOTAL_LOSS_BY_ADMIN = ($winBet->return_amount - $winBet->amount) + $winBet->club_fee + $SPcommission;
            $CURRENT_AMOUNT_BY_ADMIN = $BANK[0] - (($winBet->return_amount - $winBet->amount) + $winBet->club_fee + $SPcommission);

            #  -- - - - - -- - - --=========== START  TRANSECTION HISTORIES============ -- - -- - - - - - - --  -
            # TRANSECTION HISTORY TO USER
            $CreditsU = User::where('id', $winBet->bet_by)->pluck('credits');
            $CreditsU = $CreditsU[0];
            $LockCreditsU = User::where('id', $winBet->bet_by)->pluck('lock_credits');
            $LockCreditsU = $LockCreditsU[0];

            DB::table('user_transection')->insert(
                [
                    'user_id' => $winBet->bet_by,
                    'from_id' => '',
                    'debit' => 0,
                    'credit' => $winBet->return_amount - $winBet->amount,
                    'balance' => $CreditsU  + $LockCreditsU,
                    'description' => 'Match Win( ' . $winBet->match . ' )',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );

            # TRANSECTION HISTORY TO SPONSOR USER

            if ($SponsorID != null) {
                DB::table('user_transection')->insert(
                    [
                        'user_id' => $SponsorID,
                        'from_id' => $winBet->bet_by,
                        'debit' => 0,
                        'credit' => $SPcommission,
                        'balance' => $SPcredits + $SPcommission,
                        'description' => 'Commission on Match Win( ' . $winBet->match . ' )',
                        'created_at' =>  \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]
                );
            }

            # TRANSECTION HISTORY TO ADMIN (LOSS)
            DB::table('user_transection')->insert(
                [
                    'user_id' => $superAdmin->id,
                    'from_id' => '',
                    'debit' => $TOTAL_LOSS_BY_ADMIN,
                    'credit' => 0,
                    'balance' => $CURRENT_AMOUNT_BY_ADMIN,
                    'description' => 'Match Loss( ' . $winBet->match . ' )',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );

            # TRANSECTION HISTORY TO CLUB (WIN - - - -- - )@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

            $club_owner_id = $club->user[0]->id ?? null;

            DB::table('club_transection')->insert(
                [
                    'club_id' => $club->id,
                    'club_owner_id' => $club_owner_id,
                    'from_id' => $winBet->bet_by,
                    'debit' => 0,
                    'credit' => $winBet->club_fee,
                    'balance' => $clubCredits[0] + $winBet->club_fee,
                    'description' => 'Commission on Match win by User',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );
            #  -- - - - - -- - - --======== END  TRANSECTION HISTORIES========= -- - -- - - - - - - --  -

        }


        #__________________________________________________________________________________________


        # RETURN MONEY FROM LOOSER USERS AND SEND THOSE TO SUPER ADMIN ACCOUNT

        foreach ($lossBets as $lossBet) {

            # CHANGE STATUS OF A BET TO LOOSER
            $UpdateBet = Bet::where('id', $lossBet->id)->first();
            if ($UpdateBet) {
                $UpdateBet->update([
                    'status' => 'looser',
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

            $SuperAdminUser = User::where('id', $superAdmin->id)->first();
            if ($SuperAdminUser) {
                $SuperAdminUser->update([
                    'credits' => $BANK[0] + $lossBet->amount
                ]);
            }

            $TOTAL_WIN_BY_ADMIN = $lossBet->amount;
            $CURRENT_AMOUNT_BY_ADMIN_WIN = $BANK[0] + $lossBet->amount;


            #  -- - - - - -- - - --=========== START  TRANSECTION HISTORIES============ -- - -- - - - - - - --  -
            # TRANSECTION HISTORY TO USER (LOSS)
            $CreditsUL = User::where('id', $lossBet->bet_by)->pluck('credits');
            $CreditsUL = $CreditsUL[0];
            $LockCreditsUL = User::where('id', $lossBet->bet_by)->pluck('lock_credits');
            $LockCreditsUL = $LockCreditsUL[0];

            DB::table('user_transection')->insert(
                [
                    'user_id' => $lossBet->bet_by,
                    'from_id' => '',
                    'debit' =>  $lossBet->amount,
                    'credit' => 0,
                    'balance' => $CreditsUL  + $LockCreditsUL,
                    'description' => 'Match Loss( ' . $lossBet->match . ' )',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );


            # TRANSECTION HISTORY TO ADMIN (WIN)
            DB::table('user_transection')->insert(
                [
                    'user_id' => $superAdmin->id,
                    'from_id' => '',
                    'debit' => 0,
                    'credit' => $TOTAL_WIN_BY_ADMIN,
                    'balance' => $CURRENT_AMOUNT_BY_ADMIN_WIN,
                    'description' => 'Match Win( ' . $lossBet->match . ' )',
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );
            #  -- - - - - -- - - -- END  TRANSECTION HISTORIES -- - -- - - - - - - --  -
        }


        # CUSTOM ALERT

        $msg1 = 'message';
        $msg2 = 'Winner and Loser published!!!';

        return back()->with($msg1, $msg2);
    }
}
