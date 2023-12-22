<div>
    <x-filament-card
        title="Approved subscriptions"
        :value="Subscription::whereIn('cycle_id', function ($query) {
            $query->select('id')->from('cycles')->where('end_date', '>=', now());
        })->where('is_approve', 1)->where('user_id', auth()->user()->id)->count()"
    />

    <x-filament-card
        :title="'Cost price for ' . $f->name"
        :value="function () {
            $users = DB::table('subscriptions')
                ->join('bundles', 'subscriptions.bundle_id', '=', 'bundles.id')
                ->select(DB::raw('SUM(price)'))
                ->where('user_id', auth()->user()->id)
                ->where('is_approve', 1)
                ->whereIn('cycle_id', function ($query) {
                    $query->select('id')->from('cycles')->where('end_date', '>=', now());
                })
                ->get();

            $pattern = "/[^0-9]/"; // matches any character that is not a letter
            $replacement = "";
            $cleanString = preg_replace($pattern, $replacement, $users);
            return number_format(floatval($cleanString));
        }"
    />
</div>
