<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Job;

use App\Models\Category;
use App\Http\Requests\StoreTestRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();
        // \dd($categories);
        return view('jobSeeker.test', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        //        $request->validate([
        //            'questions'     => [
        //                'required', 'array'
        //            ],
        //            'questions.*' => [
        //                'required', 'integer', 'exists:options,id'
        //            ],
        //        ]);
        $options = Option::find(\array_values($request->input('questions')));
        $result = \auth()->user()->userResults()->create([
            'total_points' => $options->sum('points')
        ]);
        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                'option_id' => $option->id,
                'points' => $option->points
            ]];
        })->toArray();
        $result->questions()->sync($questions);
        return \redirect()->route('result.show', $result->id);
    }


    //new
//----------------the name of this function must be changed here and in the route
   /* public function index($uid,$jobid)

    {
        $user = User::find($uid);
        $job = Job::where('id', $jobid)->first();
        return view('jobProvider.Quiz', [
            'job' => $job,
            'user' => $user,
        ]);
        
    }*/
    public function createQuiz(Request $request, $jobid,$uid)
    {
        //$user = User::find(auth()->id());
        //$job=$jobid;
        /*$quiztitle = $request->quiztitle;
        $category = $request->category;
        $nbquestion=$request->nbquest;*/
        /*Quiz::Create([
            'Jobprovider_id' => $uid,
            'Job_id' => $jobid,
            'quiztitle' => $quiztitle,
            'nbquest' => $nbquestion,
            
        ]);*/
        $c=new Category;
        $q=new Quiz;
       
        $q->quiztitle=$request->input('quiztitle');
        $q->Jobprovider_id=$uid;
        $q->Job_id=$jobid;
        $q->nbquest=$request->input('nbquest');
        $q->save();




//$quiz=Quiz::where('quiztitle','=',$quiztitle);
$quiz=Quiz::where('Job_id','=',$jobid);

        $c->name=$request->input('category');
        $c->quiz_id=$quiz->id;
        $c->save();
        /*Category::Create([
            'name'=>$category,
            'quiz_id'=>$quiz->id,
        ]);*/

        return redirect()->route('Quiz');
    }
}