<?php

namespace App\Http\Controllers;

use App\Meetings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories;
use League\Flysystem\Exception;

class MeetingController extends Controller
{


    private $meetingUsersRepo;

    public function __construct()
    {
        $this->meetingUsersRepo = new Repositories\MeetingUsersRepository();

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = $request->get("order");
        $limit_str = $request->get("limit");

        $limit = 100;
        if($limit_str != null && is_numeric($limit_str)) {
            $limit = (int)$limit_str;
        }


        if($order != null && $order === "desc") {
            $meetings =  $this->meetingUsersRepo->GetMeetingUsers("desc", $limit);
        }
        else {
            $meetings = $this->meetingUsersRepo->GetMeetingUsers("asc", $limit);
        }


       $response = [
           'meetings' => $meetings
       ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_meeting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title = $request->get("title");
        $description = $request->get("description");
        $time = $request->get("time");

        $isTitleNotValid = strlen($title) < 1;
        $isDescriptionNotValid = strlen($description) < 1;
        $isTimeNotValid = strlen($time) < 1;

        if($isTitleNotValid || $isDescriptionNotValid || $isTimeNotValid) {

            $validationMessage = 'Validation Error: ';

            if($isTitleNotValid) {
                $validationMessage .= 'Title is required ';
            }

            if($isDescriptionNotValid) {
                $validationMessage .= 'Description is required ';
            }

            if($isTimeNotValid) {
                $validationMessage .= 'Time is required ';
            }

            return response()->json([
                'msg' => $validationMessage,
                'meeting' => []
            ], 200);
        }



        $meeting = new Meetings([
            'time' => Carbon::createFromFormat('YmdHie', $time),
            'title' => $title,
            'description' => $description
        ]);

        if($meeting->save()) {

            return response()->json([
                'msg' => 'Message created',
                'meeting' => $meeting
            ], 201);
        }


        return response()->json([ 'msg' => 'Error during creation!' ], 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [
            'meetings' => Meetings::find($id)
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return "meeting";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'time' => 'required|date_format:YmdHie'
        ]);

        $title = $request->get("title");
        $description = $request->get("description");
        $time = $request->get("time");

        if($id != null && is_numeric($id)) {

            $meeting = Meetings::find($id);
            if($meeting != null) {

               $meeting->title = $title;
               $meeting->description = $description;
               $meeting->time = Carbon::createFromFormat('YmdHie', $time);

               if($meeting->save()) {
                   return response()->json([ 'msg' => 'meeting updated', 'meeting' => $meeting ], 201);
               }
            }
        }

        return response()->json([ 'msg' => 'Error during updating!' ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return "meeting";
    }
}
