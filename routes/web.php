<?php





Auth::routes();



Route::get( '/' , 'HomeController@view_ticket' )->name( 'home' );

Route::get( '/Ticket', 'TicketsController@view_ticket' )->name( 'quest.ticket' );
Route::get( '/Raise' , 'TicketsController@showTicketForm' )->name( 'quest.raiseTicket' );
Route::post( '/raise' , 'TicketsController@raiseTicket' )->name( 'raise' );
Route::get( '/edit/{id}', 'TicketsController@edit' )->name('editTicket.editForm');
Route::post( '/update', 'TicketsController@update' )->name( 'update' );
Route::get( '/assign/{id}/{name}' , 'TicketsController@assign' ) ->name( 'assign' );
Route::get( '/done/{id}/{name}' , 'TicketsController@done' ) ->name( 'done' );
Route::get('/chart' , 'ChartController@view_chart' )->name( 'quest.chart' );
Route::get( '/ticket/chart' , 'ChartController@chart' ) ->name( 'charts');













