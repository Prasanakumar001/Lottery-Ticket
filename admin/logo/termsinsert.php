<?php
 include "../../config/config.php";
$editorContent = $statusMsg = '';

// If the form is submitted
if(isset($_POST['submitterms'])){
    // Get editor content
    $editorContent = $_POST['editor'];
    
    // Check whether the editor content is empty
    if(!empty($editorContent)){
        // Insert editor content in the database
        $insert = $connection->query("INSERT INTO terms (content, created,status) VALUES ('".$editorContent."', NOW(),1)");
        
        // If database insertion is successful
        if($insert){
            $statusMsg = "The editor content has been inserted successfully.";
              echo "<script>alert({$statusMsg})</script>"; 
              echo "<script>location.href='index.php'</script>";
        }else{
            $statusMsg = "Some problem occurred, please try again.";
              echo "<script>alert({$statusMsg})</script>"; 
              echo "<script>location.href='index.php'</script>";
        } 
    }else{
        $statusMsg = 'Please add content in the editor.';
          echo "<script>alert({$statusMsg})</script>"; 
          echo "<script>location.href='index.php'</script>";
    }
}
?>