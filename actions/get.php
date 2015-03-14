
<?php
  
  $file = file_get_contents('../data/todo.json');       //get the contents of our todo.json file with file_get_contents


    $output_array=[];                    //make an output array
   
    if(strlen($file) > 0)  //if the strlen of our file contents is > 0, there is something to do!
    {
     $newfile = json_decode($file,true); //json_decode the contents of the todo.json, make sure to convert it to an associative array with true as the second arguement for json_decode
      //print_r($newfile);

    $html_output = [] ;//make an variable to hold our html output, set it to a blank string
       
    //print_r($newfile);
        foreach($newfile as $key => $list)//loop through the elements of our todo array, fetching the key and record for each one
        {
            
        print_r($newfile);     

     

     //make an html element set to contain olistr todo record, much like our student record from Student Grade Table;  It should include a data-id attribute with the key (for later deleting / editing), the title, the date converted to a human-readable format, and the todo details.  Make sure to use the nl2br() function on the details so it looks right in html
     
     //add the html element set to our html output variable


      //$html_output[] = "<div class='todo_item_class'>". $list." <button class='delete' data-id = '$key'> DELETE </button></div>"; // make sure you have the brackets so you can store the content inside.
      
    //$html_output[] = "div class ='something'>" . $list . "<button class = 'delete'  data-id = '$key'> DELETE </button></div> " ;
    //print_r($html_output);

        }


           $output_array['success'] = true;
           $output_array['html'] = $html_output;
          
          //add a success=true and html elements to our output array.  html element should hold the generated HTML from above
           
    }
    else  //if the strlen was 0, there were no todo items
    {
       $output_array['success'] = false;  //add a success=false condition and appropriate error message indicating there were no records
       $output_array['message'] = 'Your files are blank. Please enter in a To-do List!';

    }
    
    
   // echo json_encode($output_array);//json encode the output array and echo it
    
    
//$candy = ['candy' => 'twix', 'shoes' => 'converse'];
//echo json_encode($candy);


    


?>
