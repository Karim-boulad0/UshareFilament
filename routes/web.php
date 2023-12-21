<?php

use App\Models\User;
use App\Models\Cycle;
use App\Models\Bundle;
use App\Models\CycleBundle;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;



Route::get('/migrate', function () {
    Artisan::call('migrate:fresh --seed');
    return 'migrated';
});


route::get('ana', function () {

    $users = DB::table('cycle_bundles')
        ->join('subscriptions', 'subscriptions.cycle_id', '=', 'cycle_bundles.cycle_id')
        ->select('stock-subscriptions.cycle_id')
        ->get();
    return $users;
});


route::get('s', function (Subscription $s, User $u, Bundle $b) {
    // dd (auth()->user()->hasAnyRole('admin'));
    // return  User::where('user_id','=',auth()->user()->id);
    //1
    // $users = User::whereHas('roles' => function($q){
    //     $q->where('name', 'admin');
    // })->get();
    //2
    // $users = User::with('roles')->where('roles.name','=','admin')->get();
    // return $users;
    //3
    // $users = DB::table('users')
    // ->with('roles')
    // ->join('roles', 'roles.user_id', '=', 'users.id')
    // ->where('roles.name', 'admin')->get();
    // nb
    // $userss=auth()->user()->getRoleNames();
    // dd($userss);

    // hyda lsah
    // $users = User::permission('create_user')->get();
    // dd ($users);

    // hyda lsah
    // $users = User::role('super-admin')->get('id');
    // return($users);

    // user li ma ando roles
    // $users_without_any_roles = User::doesntHave('roles')->get();

    // $all_roles_except_a_and_b = Role::whereNotIn('name', ['admin'])->get();
    // return $all_roles_except_a_and_b;
    // new
    // 1111
    // $user = $u->find(auth()->user()->id);
    // $a = ($user->subscriptions);
    //  $a->pluck('bundle_id')->where('bundle_id','!=',$s->pluck('bundle_id'));
    //  return  $a->pluck('bundle_id','id');
    // 2222
    // $user = $u->find(auth()->user()->id);
    // $a = ($user->subscriptions);
    // return Subscription::where('bundle_id', '!=', 1);






    // $user = User::find(auth()->user()->id);// get user
    // $SubscriptionForUser = ($user->subscriptions);// get subscription for user
    // return bundle::whereNotIn('id',$SubscriptionForUser->pluck('bundle_id','id'))
    // ->pluck('id');
    // -------------------------\

    //     $users = DB::table('subscriptions')
    //     ->join('bundles', 'subscriptions.bundle_id', '=', 'bundles.id')
    //     ->select(DB::raw('SUM(price)'))
    //     ->where('user_id',1)
    //     ->get();
    // return $users;



    // $string = "Thi$ is@ an# example^ str&ing";
    // $pattern = "/[^a-zA-Z]/"; // matches any character that is not a letter
    // $replacement = "";
    // $cleanString = preg_replace($pattern, $replacement, $string);
    // echo $cleanString;


    //////////////////
    // return Cycle::where('end_date', '<', now())->pluck('id');
    // return (Cycle::whereIn('name', ['CYCLE 16', 'CYCLE 16`'])->pluck('id'));




    ///////////////
    // INSERT INTO `cycle_bundles` (`id`, `bundle_id`, `cycle_id`, `stock`, `created_at`, `updated_at`) VALUES (NULL, '3', '4', '12', NULL, NULL);
    // CycleBundle::create([
    //     'bundle_id' => '3',
    //     'cycle_id' => '4',
    //     'stock' => '44444444444',
    //     'created_at' => now(),
    // ]);
    // return 'yes';
    // $b = CycleBundle::find(1)->get();
    // return $b->bundle;

});
Route::get('/m', function () {
    Artisan::call('migrate');
    return 'migrated';
});
