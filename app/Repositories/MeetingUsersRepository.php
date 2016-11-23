<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 2016-11-09
 * Time: 20:51
 */

namespace App\Repositories;

use DB;


class MeetingUsersRepository
{

    public function GetMeetingUsers($order, $limit) {
        $sql = "Select M.id as meeting_id, M.title, M.description, MU.id as user_id, MU.name 
                From meetings as M
                Inner Join meetings_to_users as MTU
                On M.id = MTU.meeting_id
                Inner Join meeting_users as MU
                ON MTU.user_id = MU.id
                ORDER BY M.id {$order}
                LIMIT {$limit}";

         return DB::select($sql);
    }

}