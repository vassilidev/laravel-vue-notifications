<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use Auth;
use Dflydev\DotAccessData\Data;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Notifications\DatabaseNotification;

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
     * @param DatabaseNotification $notification
     *
     * @return JsonResponse
     */
    public function delete(DatabaseNotification $notification): JsonResponse
    {
        $notification->delete();

        return response('', 200)->json();
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