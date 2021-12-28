<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistApiController extends Controller
{
    public function index()
    {
        return 'Nothing from index';
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            Wishlist::create([
                'university_id' => $request->university,
                'course_tags' => $request->courseTags,
                'user_id' => $user->id
            ]);
            return response()->json([
                'success' => 'Added to wishlist'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 401);
        }
    }

    public function show(Request $request)
    {
        return 'Nothing from show';
        // Not used
    }

    public function update(Request $request)
    {
        return 'Nothing from update';
        // Not used
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        Wishlist::where([
            'user_id' => $user->id,
            'university_id' => $request->university
        ])->delete();
        return response()->json([
            'success' => 'Removed from wishlist'
        ], 202);
    }
}
