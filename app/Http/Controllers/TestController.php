<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Quiz;
use App\Models\User;

use App\Models\Option;
use App\Models\Result;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use App\Mail\JobInterest;
use App\Models\JobProvider;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index($id)
    {
        $result = Result::where('user_id',auth()->id())->where('job_id',$id)->get()->first();
        if($result != null){
            return back()->with('message','You can only do test once!');
        }
        $categories = Category::Where('job_id', $id)->with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();
        return view('jobSeeker.test', ['categories' => $categories, 'id' => $id]);
    }

    public function store(Request $request)
    {
        $options = Option::find(\array_values($request->input('questions')));
        $result = \auth()->user()->userResults()->create([
            'total_points' => $options->sum('points'),
            'job_id'=>$request->job_id
        ]);
        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                'option_id' => $option->id,
                'points' => $option->points
            ]];
        })->toArray();
        $result->questions()->sync($questions);
        
        set_time_limit(0);
        $Job_provider = Job::where('jobs.id', '=', $request->job_id)
            ->join('job_providers','jobs.Jobprovider_id','=','job_providers.jid')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('job_providers.jid as jid', 'job_providers.*', 'users.id as uid', 'users.*','jobs.*')
            ->get()->first();
        $Job_seeker = JobSeeker::where('user_id', '=', auth()->id())
            ->join('users', 'user_id', '=', 'users.id')
            ->select('users.id as uid', 'users.*', 'job_seekers.*')
            ->get()->first();
            if($Job_provider == null){
                return \redirect()->route('result.appear', $result->id)->with('message','Something Went Wrong Email Not Sent!');
            }
        Mail::to($Job_provider->email)->send(new JobInterest($Job_provider, $Job_seeker,$result));
        return \redirect()->route('result.appear', $result->id)->with('message','Email Sent!');;
    }

    public function show($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(auth()->id());
        })->findOrFail($result_id);

        return view('jobSeeker.results', compact('result'));
    }


    public function createQuiz(Request $request, $jobid, $uid)
    {
        $c = new Category;
        $q = new Quiz;

        $q->quiztitle = $request->input('quiztitle');
        $q->Jobprovider_id = $uid;
        $q->Job_id = $jobid;
        $q->nbquest = $request->input('nbquest');
        $q->save();
        $quiz = Quiz::where('Job_id', '=', $jobid);

        $c->name = $request->input('category');
        $c->quiz_id = $quiz->id;
        $c->save();

        return redirect()->route('Quiz');
    }
}
