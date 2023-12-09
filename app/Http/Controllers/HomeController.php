<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){

        $this->middleware('auth');

    }


    public function index()
    {
        return view('admin.home');
    }

    public function pgStatus($status = null)
    {

        $generatorStatus = Site::where('generator_status_flag', $status)->get();

        return view('admin.pgdashboard', compact('generatorStatus'));

    }

    public function createFeedback()
    {

        return view('admin.feedback');
    }

    public function unsolvedProblem()
    {
        return view('admin.unsolved-problem');
    }

    public function solvedProblem()
    {
        return view('admin.solved-problem');
    }

    public function portableDetails()
    {
        return view('admin.portable.details');
    }

    public function portableProfile()
    {
        return view('admin.portable.profile');
    }

    public function portableLocation()
    {
        return view('admin.portable.location');
    }

    public function portableTrack()
    {
        return view('admin.portable.track');
    }

    public function portableTrackAll()
    {
        return view('admin.portable.track_all');
    }

    public function portableHelpingHand()
    {
        return view('admin.portable.helping_hands');
    }

    public function reportEngine()
    {
        return view('admin.report.engine');
    }

    public function reportPgEvent()
    {
        return view('admin.report.pg_event');
    }

    public function reportPgSite()
    {
        return view('admin.report.pg_site');
    }
}
