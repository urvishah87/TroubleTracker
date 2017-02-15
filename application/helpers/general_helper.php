<?php
    /***
    * Prepares the standard ajax result return array
    * 
    */
    function get_return_array() {
        return array("status" => "ERROR", "message" => "An unspecified error occured", "redirect_url" => "");    
    }
    
    
    /***
    * Sends the standard ajax result return array back to the client as JSON encoded data
    * 
    * @param array $data An associative array of data to send as JSON
    * @param boolean $exit Determines whether to quit processing after sending the result.
    */
    function send($data, $exit = true) {
        echo json_encode($data);
        
        if($exit) exit();
    }
    
    
   
    /***
    * Prints the value of the field of the passed object if it exists.
    * 
    * @param object $object
    * @param string $field The name of the field to print hte vlaue of.
    */
    function echoifobj($object, $field)
    {
        if((is_object($object)) && (property_exists($object, $field))) {        
            echo $object->$field;    
        }
    }  
    
    /***
    * Prints checked="checked" for checkboxes if the value of the field of the passed object = 1
    * 
    * @param object $object
    * @param string $field The name of the field to check the value of
    */
    function checkifobj($object, $field, $checked = 1, $check_if_not_object = true)
    {
        if((is_object($object)) && (property_exists($object, $field))) {        
            if($object->$field == $checked) {
                echo 'checked="checked" ';
            }    
        } else if($check_if_not_object) {
            echo 'checked="checked" ';
        }
    }       
    
    /***
    * Tests if an array is associative or not
    * 
    * @param array $arr
    * Returns true if the array is associative, false if not.
    */
    function is_assoc($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }       
    
    /***
    * Takes an ISO formatted date/time field and returns an AU/UK formatted date/time field
    * 
    * @param string $date An ISO formatted date
    * @returns An UK/AU formatted date
    */
    function format_date_time($date)
    {
        if(empty($date)) return "";
        
        $date_formatted = date("d/m/Y h:i:s A", strtotime($date));
        
        return $date_formatted;
    }
	
	