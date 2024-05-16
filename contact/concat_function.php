<?php
require_once('../config/connect.php') ;


function mymsg($con ,$id){


            $sql = "SELECT * FROM contact WHERE mail_emateur = '".$_SESSION['id']."'" ;
            $query = mysqli_query($con ,$sql) ;
            if(mysqli_num_rows($query) > 0) {
    echo' 
            
            <div class="showallMessages">'           ;

            while($row = mysqli_fetch_array($query)){
                $dateCreation = $row['date_creation'];
                $formattedDate = date('Y F j', strtotime($dateCreation));
               
                echo '
                <div class="msgDiv">
                  <div class="divTitle" onclick="entermsg('.$row['id'].', \'moi\')">
                    '.$row['titre'].'

</div>

<div class="somecomtnent">
  '.$row['content'].'
</div>

 <div class="param">
 <div class="date"> '.$formattedDate.'</div>
    <button class="ButnOPtion" onclick="btndelete('.$row['id'].')">X</button>
  </div>
</div>


' ;
            }
echo"</div>" ;            
            }
            else{
                echo '
                <div class="alert alert-warning">
                <strong>No messages!</strong> you didnt send any messages!
       </div>
                ' ;   
            }
}


function showallMessages($con ){


    $sql = "SELECT * FROM contact WHERE (mail_emateur = '0' AND req_id = '".$_SESSION['id']."') OR mail_emateur = '".$_SESSION['id']."'";
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0) {
echo' 
    
    <div class="showallMessages">'           ;

    while($row = mysqli_fetch_array($query)){

        $verif= $row['mail_emateur'];
        $dateCreation = $row['date_creation'];
        $formattedDate = date('Y F j', strtotime($dateCreation));
        $type="";
        if ($verif !='0'){
            $type="moi";
           
        }else{
            $type="admin";
        }
        
        echo '
        <div class="msgDiv">
          <div class="divTitle" onclick="entermsg('.$row['id'].', \''.$type.'\')">
 
        ';
        

if ($verif !='0'){

    echo'<div class="typedivTitle">moi</div>';
}else{
    echo'<div class="typedivTitle">admin</div>';
}

echo'
'.$row['titre'].'
</div>
<div class="somecomtnent">
'.$row['content'].'
</div>

<div class="param">
<div class="date"> '.$formattedDate.'</div>
<button class="ButnOPtion" onclick="btndelete('.$row['id'].')">X</button>
</div>
</div>


' ;
    }
echo"</div>" ;            
    }
    else{
        echo '
        <div class="alert alert-warning">
        <strong>No messages!</strong> you didnt send any messages!
</div>
        ' ;   
    }
}




function showallrecive($con ){


    $sql = "SELECT * FROM contact WHERE mail_emateur = '0' AND req_id = '".$_SESSION['id']."'";
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0) {
echo' 
    
    <div class="showallMessages">'           ;

    while($row = mysqli_fetch_array($query)){

        $dateCreation = $row['date_creation'];
        $formattedDate = date('Y F j', strtotime($dateCreation));
       
        echo '
        <div class="msgDiv">
          <div class="divTitle" onclick="entermsg('.$row['id'].', \'admin\')">
            '.$row['titre'].'
</div>

<div class="somecomtnent">
'.$row['content'].'
</div>

<div class="param">
<div class="date"> '.$formattedDate.'</div>
<button class="ButnOPtion" onclick="btndelete('.$row['id'].')">X</button>
</div>
</div>


' ;
    }
echo"</div>" ;            
    }
    else{
        echo '
        <div class="alert alert-warning">
        <strong>No messages!</strong> you didnt send any messages!
</div>
        ' ;   
    }
}






?>






          
