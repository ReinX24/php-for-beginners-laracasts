<?php

echo "<pre>";
var_dump($_POST);
echo "</pre>";

$db->query(
    "UPDATE 
        events 
    SET 
        event_name = :event_name, start_time = :start_time, end_time = :end_time, date = :date, place = :place
    WHERE
        id = :id",
    [
        "event_name" => $_POST["event_name"],
        "start_time" => $_POST["start_time"]
    ]
    // TODO: finish update feature
);
exit;
