<?php
class ExceptionController{
    public static function return_message_JSON($status, $message, $data, $error_log = null){
        if($status == false){
            error_log($error_log == null? $message: $error_log);
        }
        else {
            $messages_container = array(
                'status' => $status,
                'message' => $message,
                'data' => $data
            );
        }

        return array(
            "status"=>$status,
            "message"=>$message,
            "data"=>$data
        );
    }

}
?>