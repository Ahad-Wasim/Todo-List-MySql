    <?php
        
        require_once('../includes/functions.php');                  //require the functions.php file, make sure it is only added one time
        $error_array = [];                                         //create an array for error messages
        $output_array = [];                                           //create an array for output



    if(isset($_POST))  //check if the post variable exists
    {
        if(empty($_POST['title'])) //check if the title is an empty string
        {
            $error_array['title'] = 'your title input is empty';    //add to the error array, set the title to an appropriate error message: $error['title']='your message'
        }
        if(empty($_POST['date'])) //check if the date is an empty string
        {
            $error_array['date'] = 'your date input is empty!';  //add to the error array, set the date to an appropriate error message
        }
            else //if the date is not blank
            {
                $timeStamp = strtotime($_POST['date']);                          //convert the date string to a utime with strtotime
                     if($timeStamp == false){   //if the utime is false, the date string wasn't valid, and we display an error
                        $error_array['date'] = 'Please enter a proper date!'; //add to the error array, set the date to an appropirate error message
                        }
                    else if($timeStamp < time() ) //else if the utime is less than now (date set in past).  can find current time with time()
                     {
                        $error_array['date'] = "Please set a time stamp for future";  //add to the error array, set the date to an appropriate error message
                    }
            }
        
        if(empty($_POST['details'])) //if the details are blank
        {
             $error_array['details'] = 'Please put in some details';//add to the error array, set the date to an appropriate error message
        }
        

        if(count($error_array) == 0){  //if there were no errors, ie the error array has no elements
            
            $title =   $_POST['title'];
            $date =    $timeStamp;
            $details =  $_POST['details'];

           


            $assArray = ['title' => $title, 'date' => $date, 'details' => $details];          //make an associative array to hold the pieces of our date, the title, the date (converted to a utime), and the etails
              

           



            $files = file_get_contents('../data/todo.json');                                           //get the contents of our todo.json file with file_get_contents.  This is so we can add to it if it exists
            //files grabs the WHOLE JSON FILE      ../data/todo.json  // literally just does what it says it DOES  
            if(strlen($files) == 0){                                                                  //if the length of the file's contents are 0 (ie the file was empty)
               $contents_array = [];                                                                   //make a variable to hold our list's associative array
            }
            
            else{  //if the length is not 0, 
               
               $contents_array = json_decode($files,true);   //json_decode the file's contents.  make sure to use "true" in the second argument so that the output is an associative array instead of standard object
            
            }
           

            $newKeys = $date . generateRandomString();       // make a name for this record from: concatenate the utime with a random string, so we have unique IDs

            
            //echo $newKeys;

             $contents_array[$newKeys] =  $assArray;  // add a new associative array to our todo.json array, key=name generated on line above, and value is the array generated from the input data
            
           echo $contents_array;

            // [TIME_STAMP + 'LSKDAJFJL'=> TITLE, DATE, DETAILS] 

            


           $updated_json = json_encode($contents_array);                                   // json encode the modified list array, so we can replace the original file
            
           
           $files = file_put_contents('../data/todo.json',$updated_json);                      // use file_put_contents to replace the contents of the todo.json with our json_encoded object
            
           
           //NOW THE JSON FILE HAVE BEEN UPDATED
            
            
            

            if(strlen($files) > 0)  //test if the result of the file add is > 0.  If it is 0, the file add failed.
            {
                $output_array['success'] = true;    //if it was greater than 0, we had a successful add.  add a success field to our output array with a boolean value of true
                
                $output_array['message'] = 'Everything was a success';    //add a successful message to our output array
            }


            else //if the result was not greater than 0, there was an error saving the file
            {
                $output_array['success'] = false;// add a success field to our output array, and set it to false
                $output_array['message'] = 'Todo.json is empty';//give an appropriate message indicating failure
            }
        }
        else //if error array > 0, we had an error and need to report it back to the page
        {
            $output_array['success'] = false; // add a success field to our output array, and set it to false
            $output_array['message'] = 'You have errors';//give an appropriate message indicating failure
            $output_array['error'] = $error_array;   //add our error array to a key in our output array, so we can report exact errors and/or show appropriate errors on different inputs
        }
    }
    else //post wasn't set, no data was available
    {
        $output_array['success'] = false;// add a success field to our output array, and set it to false
         $output_array['message'] = 'asdf';//give an appropriate message indicating failure
    }
        echo  json_encode($output_array);//json_encode our output array, and echo it

    ?>