<?php
    include("../connect.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $make = mysqli_real_escape_string($connection, $_POST['make']);
        $type = mysqli_real_escape_string($connection, $_POST['type']); 
        $newmodel = mysqli_real_escape_string($connection, $_POST['model']);
        $modelyear = mysqli_real_escape_string($connection, $_POST['modelyear']);
        $processor = mysqli_real_escape_string($connection, $_POST['processor']);
        $ram = mysqli_real_escape_string($connection, $_POST['ram']);
        $storage = mysqli_real_escape_string($connection, $_POST['storage']);
        $graphics = mysqli_real_escape_string($connection, $_POST['graphics']);
        $os = mysqli_real_escape_string($connection, $_POST['os']);
        $screensize = mysqli_real_escape_string($connection, $_POST['screensize']);
        $weight = mysqli_real_escape_string($connection, $_POST['weight']);
        $color = mysqli_real_escape_string($connection, $_POST['color']);
        $pt1 = mysqli_real_escape_string($connection, $_POST['pt1']);
        $pt1q= mysqli_real_escape_string($connection, $_POST['pt1q']);
        $pt2 = mysqli_real_escape_string($connection, $_POST['pt2']);
        $pt2q= mysqli_real_escape_string($connection, $_POST['pt2q']);
        $pt3 = mysqli_real_escape_string($connection, $_POST['pt3']);
        $pt3q= mysqli_real_escape_string($connection, $_POST['pt3q']);
        $wireless= mysqli_real_escape_string($connection, $_POST['wireless']);
        $megapixels= mysqli_real_escape_string($connection, $_POST['megapixels']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        
        // Insert new Specifications
        $inputspecs = "INSERT INTO specifications (processor, ram, storage, graphics, operating_system, weight, color, port_type_1, port_type_1_qty, port_type_2, port_type_2_qty, port_type_3, port_type_3_qty, screen_size, wireless_indicator, model_year, megapixels) VALUES ('$processor', '$ram', '$storage', '$graphics', '$os', '$weight', '$color', '$pt1', '$pt1q', '$pt2', '$pt2q', '$pt3', '$pt3q', '$screensize', '$wireless', '$modelyear', '$megapixels')";
        $result1 = mysql_query($inputspecs);
        
        //get 'spec_id'
        $sql = "SELECT spec_id FROM specifications 
                    WHERE processor = '$processor'
                    AND ram = '$ram'
                    AND storage = '$storage'
                    AND graphics = '$graphics'
                    AND operating_system = '$os'
                    AND weight = '$weight'
                    AND color = '$color'
                    AND  port_type_1 = '$pt1'
                    AND  port_type_1_qty ='$pt1q'
                    AND  port_type_2 ='$pt2'
                    AND  port_type_2_qty ='$pt2q'
                    AND  port_type_3 ='$pt3'
                    AND  port_type_3_qty ='$pt3q'
                    AND screen_size = '$screensize'
                    AND wireless_indicator = '$wireless'
                    AND model_year = '$modelyear'
                    AND megapixels = '$megapixels'";
        $spec_id = mysql_fetch_array(mysql_query($sql))['spec_id'];
        
            // $target_dir = "./img/equipment/";
            // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // $uploadOk = 1;
            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // // Check if image file is a actual image or fake image
            // if(isset($_POST["submit"])) {
            //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            //     if($check !== false) {
            //         echo "File is an image - " . $check["mime"] . ".";
            //         $uploadOk = 1;
            //     } else {
            //         echo "File is not an image.";
            //         $uploadOk = 0;
            //     }
            // }
            
            
        
        
        // Insert new model into table
        $input = "INSERT INTO model (make_id, type_id, model, file_path, description, spec_id) VALUES ((SELECT make_id from make WHERE make ='$make'), (SELECT type_id FROM type where type = '$type'), '$newmodel', 'img/equipment/notfound.png', '$description', '$spec_id')";
            $result = mysql_query($input);
        }
        if ($result){
            header("location: ../admin_tools.php");
            exit;
        } else {
            header("location: ../new_model.php");
            $_SESSION['inserterror'] = "Insert unsuccessful. Please try again.<br>" . mysql_error($connection);
            exit;
        }

    
?>