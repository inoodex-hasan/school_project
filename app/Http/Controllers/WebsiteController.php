<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Slide;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Message;
use App\Models\Teacher;
use App\Models\ExamRoutine;
use App\Models\Page;
use App\Models\Subject;
use App\Models\Contact;

class WebsiteController extends Controller
{

public function home()
{
    // Notices: only active
    $notices = Notice::where('status', 1)
                     ->orderBy('created_at', 'desc')
                     ->take(5)
                     ->get();

    // Slides: all entries
    $slides = Slide::orderBy('created_at', 'desc')->get();

    // About: usually single row
    $about = About::first();

    // Gallery: all images
    $galleryPhotos = Gallery::where('type', 'photo')
        ->orderBy('created_at', 'desc')
        ->get();

    $galleryVideos = Gallery::where('type', 'video')
        ->orderBy('created_at', 'desc')
        ->get();

    // Message
    $messages = Message::orderBy('id')->get();

    // Events: only active
    $events = Event::where('status', 1)
                   ->orderBy('event_date', 'desc')
                   ->take(5)
                   ->get();
    // Teachers
    $teachers = Teacher::where('status', 1)
    ->orderBy('name')
    ->get();

    // Subjects
    $subjects = Subject::all();

    return view('frontend.home', compact('slides', 'notices', 'about', 'galleryPhotos', 'galleryVideos', 'events', 'messages', 'teachers', 'subjects',));
}

public function showMessage($id)
{
    $message = Message::findOrFail($id);
    return view('frontend.message', compact('message'));
}


public function showNotice($id)
    {
        $notice = Notice::findOrFail($id);
        return view('frontend.notice', compact('notice'));
    }

 public function allNotices()
    {
        $notices = Notice::where('status', 1)
                         ->orderBy('created_at', 'desc')
                         ->paginate(10); 

        return view('frontend.all_notices', compact('notices'));
    }

public function history()
{
    $about = About::first();
    return view('frontend.about_history', compact('about'));
}

// public function galleryPage()
// {

//     $galleryItems = Gallery::orderBy('created_at', 'desc')->get();
//     return view('frontend.gallery', compact('galleryItems'));
// }

public function showEvent($id)
{
    $event = Event::findOrFail($id);
    return view('frontend.event', compact('event'));
}

public function allEvents()
{
    $events = Event::where('status', 1)
                   ->orderBy('event_date', 'desc')
                   ->paginate(10);

    return view('frontend.all_events', compact('events'));  
}

public function aboutHistory()
{
    $about = Page::where('slug', 'about_history')->firstOrFail();
    return view('frontend.about_history', compact('about'));
}

public function teachers()
{
    $teachers = Teacher::all();
    return view('frontend.teachers', compact('teachers'));
}


 public function contact()
{   
    $contact = Contact::first();
    return view('frontend.contact', compact('contact'));
}


}