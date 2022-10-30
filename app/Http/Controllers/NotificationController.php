<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Notifications\TestNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $notifications = Auth::user()->notifications;

        return NotificationResource::collection($notifications);
    }

    /**
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        Auth::user()->notify(new TestNotification);

        return response()->json();
    }

    /**
     * @param string $notificationID
     *
     * @return JsonResponse
     */
    public function delete(string $notificationID): JsonResponse
    {
        Auth::user()->notifications()->find($notificationID)->delete();

        return response()->json();
    }

    /**
     * @param string $notificationID
     *
     * @return JsonResponse
     */
    public function markAsRead(string $notificationID): JsonResponse
    {
        $now = now();

        Auth::user()->notifications()->find($notificationID)->update(['read_at' => $now]);

        return response()->json(
            compact('now')
        );
    }

    /**
     * @return RedirectResponse
     */
    public function markAllReads(): RedirectResponse
    {
        Auth::user()->unreadNotifications->markAsRead();

        toast(__('All notifications have been marked as read !'), 'success');

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function deleteAll(): RedirectResponse
    {
        Auth::user()->notifications()->delete();

        toast(__('All notifications have been deleted !'), 'success');

        return redirect()->back();
    }
}