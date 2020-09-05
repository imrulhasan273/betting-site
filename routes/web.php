<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


# Route::get('/home', 'HomeController@index')->name('home');


# -----------------============= START CLIENT SIDE ROUTES ===========-------------------------

# FRONT PAGES
Route::get('/', 'HomeController@index')->name('home');
Route::get('/mybet', 'HomeController@mybet')->name('mybet');
Route::get('/support', 'HomeController@support')->name('support');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/rules', 'HomeController@rules')->name('rules');


# START BET CONTROLLER
Route::get('/place_bit', 'BetController@placeBit')->name('bets.placeBit')->middleware('auth');
Route::get('/bets/status/{bet_id}/{code}', 'BetController@status')->name('admin.bets.status'); //added
# END BET CONTROLLER

# FRONT PAGES

# PROFILE
route::group(['prefix' => 'wallet'], function () {
    Route::get('/profile', 'ProfileController@profile')->name('profiles.profile');
    Route::get('/statement', 'ProfileController@statement')->name('profiles.statement');
    Route::get('/sponsor', 'ProfileController@sponsor')->name('profiles.sponsor');
    Route::get('/oneten', 'ProfileController@oneten')->name('profiles.oneten')->middleware('auth');
    #--------------================= Controlled Using Ajax========================------------------------
    Route::get('/deposit', 'ProfileController@deposit')->name('profiles.deposit');
    Route::get('/widthdraw', 'ProfileController@widthdraw')->name('profiles.widthdraw');
    Route::get('/b-transfer', 'ProfileController@bTransfer')->name('profiles.btransfer');
    Route::get('/change-club', 'ProfileController@changeClub')->name('profiles.changeclub');
    Route::get('/change-password', 'ProfileController@changePassword')->name('profiles.changepassword');
    Route::get('/forget-password', 'ProfileController@forgetPass')->name('profiles.forgetPass');

    #------------- WEB MESSAGE USER PART---------------------------------#
    Route::get('/webmessage', 'webMessageController@indexUser')->name('webmessage.index.user');
    Route::post('/webmessage/send', 'webMessageController@sendUser')->name('webmessage.send.user');

    Route::get('/webmessage/view', 'webMessageController@viewUser')->name('webmessage.view.user');
    Route::get('/webmessage/view/sent', 'webMessageController@viewSentUser')->name('webmessage.view.user.sent');
});
# PROFILE

# -------------------------------------- START DEPOSIT CONTROLLERS ----------------------------------
Route::get('/method-id', 'DepositController@getNumber')->name('deposits.methods');
Route::get('/deposit', 'DepositController@placeDeposit')->name('deposits.place');
# -------------------------------------- END DEPOSIT CONTROLLERS ----------------------------------

# -------------------------------------- START WIDTHDRAW CONTROLLERS ----------------------------------
Route::get('/widthdraw', 'WidthdrawController@requestUserWidthdraw')->name('widthdraw.user.request');
# -------------------------------------- END WIDTHDRAW CONTROLLERS ----------------------------------




# -----------------============= END CLIENT SIDE ROUTES ===========-------------------------#



#___________________________________________________ START DASHBOARD | ADMIN SIDE___________________________________________
route::group(['prefix' => 'admin'], function () {

    # START BACKEND CONTROLLER ---- ALL THE INDEX PAGES OF ALL CONTROLLERS ARE CONTROLLED HERE.
    Route::get('/', 'backendController@index')->name('admin.index')->middleware(['roleChecker:super_admin,admin,club_admin']);
    Route::get('/setting', 'backendController@settings')->name('admin.setting')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/notice', 'backendController@notices')->name('admin.notice')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/users', 'backendController@users')->name('admin.users')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/roles', 'backendController@roles')->name('admin.roles')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/clubs', 'backendController@clubs')->name('admin.clubs')->middleware(['roleChecker:super_admin,admin,club_admin']);

    Route::get('/games', 'backendController@games')->name('admin.games')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/fgames', 'backendController@fgames')->name('admin.fgames')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/bets', 'backendController@bets')->name('admin.bets')->middleware(['roleChecker:super_admin,admin,null']);

    Route::get('/autostack-category', 'backendController@AutoStackCats')->name('admin.AutoStackCats')->middleware(['roleChecker:super_admin,admin,null']);

    Route::get('/payment-options', 'backendController@PaymentOption')->name('admin.paymentOption')->middleware(['roleChecker:super_admin,admin,null']);

    Route::get('/deposits-user', 'backendController@UserDeposit')->name('admin.user.deposit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/widthdraw-user', 'backendController@UserWidthdraw')->name('admin.user.widthdraw')->middleware(['roleChecker:super_admin,admin,null']);

    Route::get('/session', 'backendController@session')->name('admin.session')->middleware(['roleChecker:super_admin,null,null']);

    # END BACKEND CONTROLLER

    #===================================================================================================

    # START DEPOSIT CONTROLLER
    Route::get('/deposits/{deposit}/{code}', 'DepositController@status')->name('deposits.status')->middleware(['roleChecker:super_admin,admin,null']); //added
    #  END DEPOSIT CONTROLLER

    # START WIDTHDRAW CONTROLLER
    Route::get('/widthdraw-By-User/{widthdraw}/{code}', 'WidthdrawController@statusChangeByUser')->name('widthdraws.statusChangeByUser')->middleware('auth'); //added
    Route::get('/widthdraw/{widthdraw}/{code}', 'WidthdrawController@status')->name('widthdraws.status')->middleware(['roleChecker:super_admin,admin,null']); //added
    # END WIDTHDRAW CONTROLLER

    # ------START INDEX CONTROLLER
    Route::get('/account-balance/edit', 'IndexController@edit')->name('index.acc.edit')->middleware(['roleChecker:super_admin,null,null']);
    Route::post('/account-balance/update', 'IndexController@update')->name('index.acc.update')->middleware(['roleChecker:super_admin,null,null']);
    # SPONSOR COMMISSION
    Route::post('/sponsor-commission/update', 'UserController@SponsorCommission')->name('sponsor.commission.update')->middleware(['roleChecker:super_admin,null,null']);
    # ------END INDEX CONTROLLER




    # -- START PAYMENT CONTROLLER --
    Route::get('/payments-option/create', 'PaymentOptionController@create')->name('payments-option.create')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/payments-option/store', 'PaymentOptionController@store')->name('payments-option.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/payments-option/{paymentOption}/edit', 'PaymentOptionController@edit')->name('payments-option.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/payments-option/update', 'PaymentOptionController@update')->name('payments-option.update')->middleware(['roleChecker:super_admin,admin,club_admin']);
    Route::get('/payments-option/{paymentOption}/destroy', 'PaymentOptionController@destroy')->name('payments-option.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    # --  END PAYMENT CONTROLLER

    #-- START USER CONTROLLERS
    Route::get('/users/add', 'UserController@add')->name('users.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/users/store', 'UserController@store')->name('users.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/users/update', 'UserController@update')->name('users.update')->middleware(['roleChecker:super_admin,admin,club_admin']);
    Route::get('/users/{user}/destroy', 'UserController@destroy')->name('users.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    # -- -- -- - -- - - -
    Route::get('/users-password/{user}/edit', 'UserController@PassEdit')->name('users.pass.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/users-password/update', 'UserController@PassUpdate')->name('users.pass.update')->middleware(['roleChecker:super_admin,admin,club_admin']);
    # --END USER CONTROLLERS


    # ------ START CLUBS CONTROLLER
    Route::get('/clubs/add', 'ClubController@add')->name('clubs.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/clubs/store', 'ClubController@store')->name('clubs.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/clubs/{club}/edit', 'ClubController@edit')->name('clubs.edit')->middleware(['roleChecker:super_admin,admin,club_admin']);
    Route::post('/clubs/update', 'ClubController@update')->name('clubs.update')->middleware(['roleChecker:super_admin,admin,club_admin']);
    Route::get('/clubs/{club}/{user}/destroy', 'ClubController@destroy')->name('clubs.destroy')->middleware(['roleChecker:super_admin,admin,club_admin']);
    # --- CLUB WIDTHDRAW CLUB ACCESS
    Route::get('/clubs/withdraw', 'ClubController@clubsWithdrawList')->name('admin.clubs.withdraw.list')->middleware(['roleChecker:null,null,club_admin']);
    Route::get('/clubs/withdraw/request', 'ClubController@clubsWithdrawRequest')->name('admin.clubs.withdraw.request')->middleware(['roleChecker:null,null,club_admin']);
    Route::post('/clubs/withdraw/store', 'ClubController@WidthDrawPlace')->name('admin.clubs.withdraw.place')->middleware(['roleChecker:null,null,club_admin']);
    Route::get('/widthdraw-By-Club/{widthdraw}/{code}', 'ClubController@statusChangeByClub')->name('widthdraws.statusChangeByClub')->middleware(['roleChecker:null,null,club_admin']); //added

    # ---- CLUB WIDTHDRAW ADMIN ACCESS
    Route::get('/clubs-withdraw-admin', 'ClubController@ClubWidthdraw')->name('admin.clubs.withdraw')->middleware(['roleChecker:super_admin,admin,club_admin']);
    Route::get('/widthdraw-status/{widthdraw}/{code}', 'ClubController@WidthdrawStatus')->name('admin.widthdraws.status.club')->middleware(['roleChecker:super_admin,admin,null']); //added
    # ------ END CLUBS CONTROLLER

    # ______________________________ START AUTO STACK MANAGEMENT RELATED CONTROLLERS_________________________________________________________
    #  --  START AUTO STACK CATEGORY --
    Route::get('/autostack-category/add/', 'AutoStackCategoryController@add')->name('admin.auto_stack.cats.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/autostack-category/store', 'AutoStackCategoryController@store')->name('admin.auto_stack.cats.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/autostack-category/{autoStackCategory}/edit', 'AutoStackCategoryController@edit')->name('admin.auto_stack.cats.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/autostack-category/update', 'AutoStackCategoryController@update')->name('admin.auto_stack.cats.update')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/autostack-category/{autoStackCategory}/destroy', 'AutoStackCategoryController@destroy')->name('admin.auto_stack.cats.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    # STACK OPTIONS
    Route::get('/autostack-category/stack-options/{autoStackCategory}', 'AutoStackCategoryController@stackOptions')->name('admin.auto_stack.stack_options')->middleware(['roleChecker:super_admin,admin,null']);
    #  --  END AUTO STACK CATEGORY ----
    #-- START  STACK QUESTION CONTROLLERS
    Route::get('/autostack-category/stack-options/q/add/{autoStackCategory}', 'StackQuestionController@add')->name('admin.auto_stack.stack_options.question.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/autostack-category/stack-options/q/store', 'StackQuestionController@store')->name('admin.auto_stack.stack_options.question.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/autostack-category/questions/{stackQuestion}/destroy', 'StackQuestionController@destroy')->name('admin.auto_stack.stack_options.question.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/autostack-category/questions/status/{cat_id}/{ques_id}/{code}', 'StackQuestionController@status')->name('admin.auto_stack.stack_options.question.status')->middleware(['roleChecker:super_admin,admin,null']);
    # --END  STACK QUESTION CONTROLLERS

    #-- START AUTO STACK ANSWER CONTROLLERS
    Route::get('/games/betting_options/a/add/{autoStackCategory}/{stackQuestion}', 'StackAnswerController@add')->name('admin.auto_stack.stack_options.ques.answer.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/autostack-category/stack-options/a/store', 'StackAnswerController@store')->name('admin.auto_stack.stack_options.ques.answer.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/autostack-category/answers/{stackAnswer}/destroy', 'StackAnswerController@destroy')->name('admin.auto_stack.stack_options.ques.answer.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/autostack-category/answers/{cat_id}/{stackAnswer}/edit', 'StackAnswerController@edit')->name('admin.auto_stack.stack_options.ques.answer.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/autostack-category/answers/update', 'StackAnswerController@update')->name('admin.auto_stack.stack_options.ques.answer.update')->middleware(['roleChecker:super_admin,admin,null']);
    # --END AUTO STACK ANSWER CONTROLLERS

    # ______________________________ END AUTO STACK MANAGEMENT RELATED CONTROLLERS_________________________________________________________



    # ______________________________ START GAME RELATED CONTROLLERS_________________________________________________________
    #-- START GAME CONTROLLERS
    Route::get('/games/add', 'GameController@add')->name('games.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/games/store', 'GameController@store')->name('games.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/{game}/edit', 'GameController@edit')->name('games.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/games/update', 'GameController@update')->name('games.update')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/{game}/destroy', 'GameController@destroy')->name('games.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    #-------BETTING OPTIONS
    Route::get('/games/betting_options/{game}', 'GameController@betOptons')->name('admin.games.bet')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/status/{game_id}/{code}', 'GameController@status')->name('admin.games.status')->middleware(['roleChecker:super_admin,admin,null']); //added
    # ---------AUTO STACK ADDITION
    Route::post('/games/betting_options/', 'GameController@addStack')->name('admin.games.addStack')->middleware(['roleChecker:super_admin,admin,null']); //added

    # --END GAME CONTROLLERS


    #-- START QUESTION CONTROLLERS
    Route::get('/games/betting_options/q/add/{game}', 'QuestionController@add')->name('admin.games.bet.question.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/games/betting_options/q/store', 'QuestionController@store')->name('admin.games.bet.question.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/questions/{question}/destroy', 'QuestionController@destroy')->name('admin.games.bet.question.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/questions/status/{game_id}/{ques_id}/{code}', 'QuestionController@status')->name('admin.games.question.status')->middleware(['roleChecker:super_admin,admin,null']); //added
    # --END QUESTION CONTROLLERS

    #-- START ANSWER CONTROLLERS
    Route::get('/games/betting_options/a/add/{game}/{question}', 'AnswerController@add')->name('admin.games.bet.ques.answer.add')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/games/betting_options/a/store', 'AnswerController@store')->name('admin.games.bet.ques.answer.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/answers/{answer}/destroy', 'AnswerController@destroy')->name('admin.games.bet.ques.answer.destroy')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/games/answers/status/{game_id}/{ans_id}/{code}', 'AnswerController@status')->name('admin.games.bet.ques.answer.status')->middleware(['roleChecker:super_admin,admin,null']); //added

    Route::get('/games/answers/{game_id}/{answer}/edit', 'AnswerController@edit')->name('admin.games.bet.ques.answer.edit')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/games/answers/update', 'AnswerController@update')->name('admin.games.bet.ques.answer.update')->middleware(['roleChecker:super_admin,admin,null']);

    # --- ---- ----- ---- ---- ---- ---WIN/LOSS IN ANSWEWR ---- ---- ---- ---
    Route::get('/games/answers/result{question}/{answer}', 'AnswerController@result')->name('admin.games.bet.ques.answer.result')->middleware(['roleChecker:super_admin,admin,null']);

    # --END ANSWER CONTROLLERS
    # ______________________________ END GAME RELATED CONTROLLERS_________________________________________________________



    #-- START SETTINGS CONTROLLER
    Route::post('/setting/store', 'settingsController@settingStore')->name('admin.setting.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/setting/update/{id}', 'settingsController@settingUpdate')->name('admin.setting.update')->middleware(['roleChecker:super_admin,admin,null']);
    #-- END SETTINGS CONTROLLER


    #-- NOTICE CONTROLLER
    Route::post('/notice/store', 'noticeController@noticeStore')->name('admin.notice.store')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/notice/update/{id}', 'noticeController@noticeUpdate')->name('admin.notice.update')->middleware(['roleChecker:super_admin,admin,null']);
    #-- END CONTROLLER


    #-- MESSAGE CONTROLLER
    Route::get('/message', 'MessageController@index')->name('admin.message')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/message/send', 'MessageController@send')->name('admin.message.send')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/message/view', 'MessageController@view')->name('admin.message.view')->middleware(['roleChecker:super_admin,admin,null']);
    #-- MESSAGE CONTROLLER

    #------------- WEB MESSAGE Admin PART---------------------------------#
    Route::get('/webmessage', 'webMessageController@AdminIndex')->name('webmessage.admin.index')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/webmessage/club_messages', 'webMessageController@AdminClubIndex')->name('webmessage.admin.club.index')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/webmessage/get/{user_id}', 'webMessageController@Admingetuser')->name('webmessage.user.get')->middleware(['roleChecker:super_admin,admin,null']);
    Route::get('/webmessage/sent/view', 'webMessageController@AdminviewSent')->name('webmessage.admin.view')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/webmessage/send/{user_id}', 'webMessageController@AdminSendMessage')->name('webmessage.admin.send')->middleware(['roleChecker:super_admin,admin,null']);


    Route::get('/webmessage/send/club', 'webMessageController@AdminSendMessageClub')->name('webmessage.admin.send.club')->middleware(['roleChecker:super_admin,admin,null']);
    Route::post('/webmessage/send/club/store', 'webMessageController@AdminSendMessageClubStore')->name('webmessage.admin.send.club.store')->middleware(['roleChecker:super_admin,admin,null']);


    #------------- WEB MESSAGE Club PART---------------------------------#
    Route::get('/webmessage/club', 'webMessageController@ClubIndex')->name('webmessage.club.index')->middleware(['roleChecker:club_admin,null,null']);
    // Route::get('/webmessage/club/sent/view', 'webMessageController@ClubviewSent')->name('webmessage.club.view')->middleware(['roleChecker:null,null,club']);

    Route::get('/webmessage/Clubsend/', 'webMessageController@ClubSendMessage')->name('webmessage.club.send')->middleware(['roleChecker:club_admin,null,null']);
    Route::post('/webmessage/Clubsend/store', 'webMessageController@ClubStoreMessage')->name('webmessage.club.store')->middleware(['roleChecker:club_admin,null,null']);
    Route::get('/webmessage/Clubsend/view', 'webMessageController@ClubSentItems')->name('webmessage.club.sent.items')->middleware(['roleChecker:club_admin,null,null']);
});
