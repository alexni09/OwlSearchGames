<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserClasses\Misc;
use Carbon\Carbon;

class IdeaController extends Controller {
    protected static function carbonRnd() { return Carbon::now()->addHour()->addMinutes(intval(rand(0,30))); }

    public function markIdea(Request $request) {
        if (!$request['operation']) abort(403);
        $operation = $request['operation'];
        if (!is_int($operation)) abort(403);
        if ($operation < Misc::MIN_IDEA_OPERATION) abort(403);
        if ($operation > Misc::MAX_IDEA_OPERATION) abort(403);
        switch($operation) {
            case 1: session(['isMessageLoginRegisterDisplayed' => true]); break;
            case 2: session(['isMessageAdvancedDisplayed' => true]); break;
            case 3: session(['isMessagePremiumPromoDisplayed' => true]); break;
            case 4: session(['isMessagePremiumDisplayed' => true]); break;
            case 5: session(['isMessageBecameDonorDisplayed' => true]); break;
            case 6: session(['dateAdvanced' => static::carbonRnd()]); break;
            case 7: session(['datePremium' => static::carbonRnd()]); break;
            case 8: session(['datePremium' => static::carbonRnd()]); break;
        }
        return response()->noContent();
    }
}