<?php  
 $id="";
       
    //hier wird description bei Modalbox gesetzt
    if(isset($_POST["description_id"]))
    {   
        $id=$_POST["description_id"];
        $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
        $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["description_id"]."'";
        $result = mysqli_query($connect, $query);
        $output="";
        $result = mysqli_query($connect, $query);
          while($row = mysqli_fetch_array($result))  
          {
        $output .=$row["l_description"];        
              
         echo $output; 
    }
    
}
//hier wird Titel bei Modalbox gesetzt
 if(isset($_POST["title_id"]))
    {
        
        $output2="";
        $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
        $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["title_id"]."'";
        $result = mysqli_query($connect, $query);
          while($row = mysqli_fetch_array($result))  
          {
        $output2 .=$row["name"];        
              
         echo $output2; 
    }
    
}

//hier value beim Submit button hinterlegen, damit rating korrekt abgelegt werden kann. 
 if(isset($_POST["projectform_id"]))
    {
        
        $output3="";
        $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
        $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["projectform_id"]."'";
        $result = mysqli_query($connect, $query);
          while($row = mysqli_fetch_array($result))  
          {
        $output3 .='
        
             <button type="submit" value='.$_POST["projectform_id"].' name="submit" data-backdrop="static" data-toggle="modal" class="btn btn-primary">Submit</button>
        
        
        ';        
              
         echo $output3; 
    }
    
}

if(isset($_POST["rating_id"]))
{
            
            $output4="";
            $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
            $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["rating_id"]."'";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result))  
            {
                
            $id=$row["id"];   
            $path="rating/$id.json";
                
            if (file_exists($path)){
            $display_rating = json_decode(file_get_contents($path), true);
            $display_rating_size = sizeof($display_rating);
            $display_rating_size--;   
                
            for ($i = $display_rating_size; $i>=0; $i--){
                 $output4 .='
                <div class="card">
                <div class="card-body">
                <h5 class="card-title">'.$display_rating[$i]['formtitle'].'</h5>
                <p class="card-text">'.$display_rating[$i]['formtext'].'</p>
                <small class="text-muted">'.$display_rating[$i]['formname'].'</small>
                
                <br>';    
                
                //display rating star
                if ($display_rating[$i]["rating"] == 1){
                    $output4 .='
                    
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    ';
                }
                
                if ($display_rating[$i]["rating"] == 2){
                     $output4 .='
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    
                    ';
                }     
                
                if ($display_rating[$i]["rating"] == 3){
                    $output4 .='
                    
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    
                     ';
                }
                
                if ($display_rating[$i]["rating"] == 4){
                    
                    $output4 .='
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color:gold"></i>
                    
                     ';
                }
                if ($display_rating[$i]["rating"] == 5){
                    
                    $output4 .='
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    <i class="fa fa-star" aria-hidden="true" style="color:gold"></i>
                    
                    ';
                }
                  $output4 .='     
        </div>
        </div>';
            }
        }
    }
    
    echo $output4;
}


if(isset($_POST["follow_id"])){
    
    $output5="";
            $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
            $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["follow_id"]."'";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result))  
            {
    
    $output5 .='
    
                        <table class="table">
                    
                            <tbody>
                            
                            ';
                            if($row["website"] != ""){
                             $output5 .=    
                            '<tr data-href="'.$row["website"].'">
                            <th scope="row" style="width: 1%">
                            <i class="fa fa-institution" style="font-size:24px;color:grey"></i>    
                            </th>
                            <td>Website</td>
                            </tr>
                            ';
                            }
                        
                            
                            
                            if($row["telegram"] != ""){
                            $output5 .=                                 
                            '<tr data-href="'.$row["telegram"].'">
                            <th scope="row" style="width: 1%">
                            <i class="fa fa-telegram" style="font-size:24px;color:#41aff4"></i>    
                            <td>Telegram</td>
                            </tr>';
                            }
                
                
                
                            if($row["twitter"] != ""){
                            $output5 .= 
                            '<tr data-href="'.$row["twitter"].'">
                            <th scope="row" style="width: 1%">
                            <i class="fa fa-twitter" style="font-size:24px;color:#41c4f4"></i>    
                            </th>
                            <td>Twitter</td>
                            </tr>';
                            }
                    
                
                            if($row["medium"] != ""){
                            $output5 .=     
                            '<tr data-href="'.$row["medium"].'">
                            <th scope="row" style="width: 1%">
                            <i class="fa fa-medium" style="font-size:24px;color:#449955"></i>    
                            </th>
                            <td>Medium</td>
                            </tr>';
                            }
                
                            '</tbody>
                            </table>
    
    ';
    
            }
    
    echo $output5;
    
}


if(isset($_POST["lead_id"])){
    
            $output6="";
            $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
            $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["lead_id"]."'";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result))  
            {
                
            $output6 .= '<b>'.$row["lead1"].'</b>';
                if($row["lead2"] != ""){
                    
                    $output6 .= ' and <b>'.$row["lead2"].'</b>';
                    
                }
                
           $output6 .= '<br><br>
            Team size: <b>'.$row["team_size"].'</b>';
            
        }
        
        echo $output6;
}


if(isset($_POST["video_id"])){
    
            $output6="";
            $connect = mysqli_connect("localhost", "USER387434_tp2", "MetaGros01!", "db_387434_5");
            $query = "SELECT * FROM tezostable WHERE ID ='".$_POST["video_id"]."'";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result))  
            {
                
            if($row["video"]!= ""){
               $output6 .= ' <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="'.$row["video"].'"></iframe>
                        </div>'; 
                
            }
                
                else $output6 .= 'No video available';
            
            
        }
        
        echo $output6;
}



?>
<script>
$(function(){
    $('.table tr[data-href]').each(function(){
        $(this).css('cursor','pointer').hover(
            function(){ 
                $(this).addClass('active'); 
            },  
            function(){ 
                $(this).removeClass('active'); 
            }).click( function(){ 
                document.location = $(this).attr('data-href'); 
            }
        );
    });
});
</script>
    