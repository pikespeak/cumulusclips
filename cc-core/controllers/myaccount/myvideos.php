<?php

### Created on April 30, 2009
### Created by Miguel A. Hurtado
### This script allows users to view and remove their uploaded videos


// Include required files
include ('../../config/bootstrap.php');
App::LoadClass ('User');
App::LoadClass ('Video');
App::LoadClass ('Pagination');
App::LoadClass ('Rating');
View::InitView();


// Establish page variables, objects, arrays, etc
View::$vars->logged_in = User::LoginCheck (HOST . '/login/');
View::$vars->page_title = 'Techie Videos - My Videos';
View::$vars->user = new User (View::$vars->logged_in);
$records_per_page = 9;
$url = HOST . '/myaccount/myvideos';
View::$vars->success = NULL;





/***********************
Handle Form if submitted
***********************/

if (isset ($_GET['vid']) && is_numeric ($_GET['vid'])) {

    $data = array ('user_id' => View::$vars->user->user_id, 'video_id' => $_GET['vid']);
    $id = Video::Exist ($data);
    if ($id) {
        Video::Delete ($id);
        View::$vars->success = Language::GetText('success_video_deleted');
    }

}


// Retrieve total count
$query = "SELECT video_id FROM videos WHERE user_id = " . View::$vars->user->user_id . " AND status = 6";
$result_count = $db->Query ($query);
$total = $db->Count ($result_count);

// Initialize pagination
View::$vars->pagination = new Pagination ($url, $total, $records_per_page);
$start_record = View::$vars->pagination->GetStartRecord();

// Retrieve limited results
$query .= " LIMIT $start_record, $records_per_page";
View::$vars->result = $db->Query ($query);


// Output page
View::SetLayout ('portal.layout.tpl');
View::Render ('myaccount/myvideos.tpl');

?>