<?php require_once ('core/connection.php'); ?>
<?php require_once('core/header.php'); ?>
<?php require_once('core/topbar.php'); ?>
<div class="info main-content">
    <?php

    //Look for the info_id (or row id) from the URL
    $info_id = isset($_GET['id'])?$_GET['id']:NULL;
    if($info_id != NULL){
        // If key exists for info_id,search for value in the database, ie all_data array since it contains the entire table.
        foreach ($all_data as $record)
        {
            if($record[0] == $info_id){

                //If we find the value from the key we passed, display those data in nice form. Null/Empty records are discarded. 
                $i = 0; // counting index of data row, ie record. 
                foreach ($record as $data)
                {                  

                    // display the key field , ie name. 
                    if(strpos($datatype[$i],"name") !== false){
                        echo '<h3>'.$data.'</h3>';
                    }
                    // display the address, when clicked, pass the map value and open the map.php page to display map of the address.
                    else if(strpos($datatype[$i],"map") !== false){
                        echo '<a id="map-link" href="" onclick="openMap('.$info_id.');">'.$data.'</a>';
                    }
                    //create click to call button for field with datatype "phone"
                    else if(strpos($datatype[$i],"phone") !== false){
                        echo '<a href="tel:'.$data.'">'.$data.'</a>';
                    }
                    // create click to email button for field with datatype "email"
                    else if(strpos($datatype[$i],"email") !== false){
                        echo '<a href="mailto:'.$data.'">'.$data.'</a>';

                    }
                    // create a clickable link to datatype "url"
                    else if(strpos($datatype[$i],"url") !== false){
                        echo '<a target="_blank" href="'.linkify($data).'">'.linkify($data).'</a>';
                    }

                    //if datatype is image, validate link and display it.
                    else if(strpos($datatype[$i],"image") !== false){
                        if(is_good_link($data)){
                            $data = linkify($data);
                            echo '<div class="center image"><img src="'.$data.'"/></div>';
                        }
                    }

                    //if datatype is video, validate link and display it.
                    else if(strpos($datatype[$i],"video") !== false){
                        if(is_good_link($data)){
                            $data = linkify($data);
                            echo '<div class="center video">';
                            if(strpos($data,".") != false){
                                echo 
                                '<video controls>
                                <source src="'.$data.'" type="video/mp4">
                                <source src="'.$data.'" type="video/ogg">
                                Your browser does not support the video tag.
                                </video>';
                            }
                            //if video is YouTube video, append appropriate link before video id. 
                            else{
                                echo '<embed src="http://www.youtube.com/v/'.$data.'"">';
                            }
                            echo '</div>';
                        }
                        
                    }

                    //if datatype is video, validate link and display it.
                    else if(strpos($datatype[$i],"audio") !== false){
                        if(is_good_link($data)){
                            $data = linkify($data);
                            echo
                            '<div class="center audio"><audio controls>
                            <source src="'.$data.'" type="audio/ogg">
                            <source src="'.$data.'" type="audio/mpeg">
                            Your browser does not support the audio element.
                            </audio></div>';
                        }
                    }

                    //if datatype is text,just display it.
                    else if(strpos($datatype[$i],"text") !== false){
                        echo $data;
                    }
                    else{
                    }
                    //put horizontal line after non-empty data fields.
                    if(strlen($data)>1){
                        echo "<hr>";
                    }
                    $i++;
                }
            }
        }
    }
    ?>
</div>
<?php require_once("core/footer.php"); ?>