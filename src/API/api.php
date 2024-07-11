<?php
include "db.php";


header('Access-Control-Allow-Origin: *');

/*if (isset($_SERVER['HTTP_ORIGIN'])){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 1000');
    
}

if ($_SERVER["REQUEST_METHOD"] == 'OPTIONS' ){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
        header("Access-Control-Allow-Headers: Access, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
    }
    exit(0);
}*/

$res = array ();
$res["error"]= false;
$res["message"]= "";

$action = '';

if (isset($_GET['action'])){
    $action = $_GET['action'];

}
/***********************************************************************(Login)******************************************************************************************************* */

if ($action == "login"){
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pas = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE Email ='$email' AND  password ='$pas'";
        $result = $conn->query($sql);
        if ($result) {
            $userData = [];
            while ($row = $result->fetch_assoc()) {
                array_push($userData,$row);
            }
              $res["Users"]=$userData;
        }

        if ($result) {
            $num = mysqli_num_rows($result);

            if ($num > 0){
                $res ['error'] = false;
                $res['message'] = "Login Successfully";
            } else {
                $res['error'] = true;
                $res['message'] = "Your Login Email or password is invalid";
            }
        }
        
   } 
   
}


/****************************************************************************(Sing up)******************************************************************************************************** */
if ($action == "Signup") {
   $cvName ="";
   $upload_path="";
   if(isset($_FILES["cvfile"]["name"])){
        $cvFileName = $_FILES["cvfile"]["name"];
        $valid_extension =array ("pdf","png","jpg");
        $extension = pathinfo($cvFileName, PATHINFO_EXTENSION);
        if(in_array($extension,$valid_extension)){
          $upload_path = "../assets/cv-data/". $cvFileName;
          $cvName = $upload_path;
        }else{
          $res["error"] = true;
          $res["message"] = "cv can has to be : PDF, PNG, JPG";
        } 
    
    }else{
      $res["error"] = true;
      $res["message"] = "Must Select CV";
    }
    $res["newCvUploaded"]= $cvName;
    if($cvName !="" && $upload_path !=""){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
       $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
        $funCtion = $_POST['funCtion'];
        $specialization = $_POST['specialization'];
        $phone = $_POST['phone'];
        $fullName = $firstName . ' ' . $lastName;
        if(move_uploaded_file($_FILES["cvfile"]["tmp_name"], $upload_path )){
           if ($fullName == "" ||$firstName == "" || $lastName == "" || $email == "" || $password == "" || $confirmPassword == "" || $function == "" || $specialization == "" || $phone == "") {
              $res['error'] = true;
              $res['message'] = "Please fill in all the fields.";
            }if ($password !== $confirmPassword) {
             $res['error'] = true;
              $res['message'] = "Password does not match the confirmation.";
            } 
            $sql = "SELECT * FROM `users` WHERE Email ='$email' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                  $res['message'] = "This email is in used!!!!!! ";
            } else {
                $sql = "INSERT INTO `users` (`full_name`,`firstName`, `lastName`, `Email`, `password`, `Funcation`, `Specialization`, `Phone`, `cv`) 
                VALUES ('$fullName','$firstName', '$lastName', '$email', '$password', '$funCtion', '$specialization', '$phone', '$cvName')";
                $result = $conn->query($sql);
                if($sql){
                    $rse["error"]= false;
                    $res["message"]="Congratulations, Sing up Successfully ";
                }else{
                    $rse["error"]= true;
                    $res["message"]="An error occurred, please try again!!!!!!!  ";
                }    
            }
        }else{
            $res["error"] = true;
            $res["message"] = "Faild Saving Cv, try again!";
        }
    }                 
}
/******************************************************************************************(Add Resersh)****************************************************************************************************** */

if($action == "UplaodResersh"){

    $attachment ="";
    $upload_path="";
    $imgattac ="";
    $pic_path ="";
    if(isset($_FILES["attachment"]["name"])){
        $attachmentName = $_FILES["attachment"]["name"];
        $valid_extension =array ("pdf"," png","jpg","mp4","mva");
        $extension = pathinfo($attachmentName, PATHINFO_EXTENSION);
        if(in_array($extension,$valid_extension)){
           //$newGanratedId =  generateRandomString(25);
           $upload_path = "../assets/AddResearch_data/". $attachmentName;
           $attachment = $upload_path;
        }else{
           $res["error"] = true;
           $res["message"] = "cv can has to be : PDF, PNG, JPG, MP4, MVA";
        } 
     
    }else{
       $res["error"] = true;
       $res["message"] = "Must Select CV";
    }
    if(isset($_FILES["image"]["name"])){
        $imgattac = $_FILES["image"]["name"];
        $valid_extension =array ("pdf"," png","jpg","mp4","mva");
        $extension = pathinfo($attachmentName, PATHINFO_EXTENSION);
        if(in_array($extension,$valid_extension)){
           //$newGanratedId =  generateRandomString(25);
           $pic_path = "../assets/picResearch/". $imgattac;
           $attachment = $pic_path;
        }else{
           $res["error"] = true;
           $res["message"] = "cv can has to be : PDF, PNG, JPG, MP4, MVA";
        } 
     
    }else{
       $res["error"] = true;
       $res["message"] = "Must Select CV";
    }
    //$res["newattachmentUploaded"]= $attachment;
    if($attachment !="" && $upload_path !="" && $imgattac !="" &&$pic_path !=""){
        $title = $_POST['title'];
        $arSummary = $_POST['arSummary'];
        $enSummary = $_POST['enSummary'];
        $researcher =$_POST['researchersData'];
        $belong =$_POST['belongingData'];
        $RrlTechnology = $_POST['RrlTechnology'];
        $researchLink = $_POST['researchLink'];
        $attac = "AddResearch_data/".$attachmentName;
        $piceres = "picResearch/".$imgattac;
        if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $upload_path )&& move_uploaded_file($_FILES["image"]["tmp_name"], $pic_path )){
           if (empty($title) || empty($arSummary) || empty($enSummary) || empty($researchLink)) {
                $res['error'] = true;
                $res['message'] = "Please fill in all the fields.";
            }else {      
                $sql = "INSERT INTO `resarsch` (`Title`,`Researchers`,`belong`,`Summary_AR`, `Summary_EN`,`Research_Link`,`Related_technology` , `picResarch`,`attachmentFile`) 
                VALUES ('$title','$researcher', ' $belong','$arSummary', '$enSummary', '$researchLink','$RrlTechnology','$piceres' ,'$attac ')";
                    $result = $conn->query($sql); 
                    if($sql){
                        $rse["error"]= false;
                        $res["message"]="The search has been loaded ";
                    }else{
                        $rse["error"]= true;
                        $res["message"]="Search failed to load!!!!!!!  ";
                    }    
            } 
        }else{
            $res["error"] = true;
            $res["message"] = "same thing is error!!!";
        }
    }
}

/********************************************************************************************(ADD Patent)**************************************************************************************************** */
if ($action == "UplaodPatent") {
    $Patent = "";
    $upload_path = "";
    $imgName = "";
    $logo_path = "";
    if (isset($_FILES["patent"]["name"])) {
        $vidName = $_FILES["patent"]["name"];
        $valid_extension = array("pdf", "png", "jpg", "mp4", "mva");
        $extension = pathinfo($vidName, PATHINFO_EXTENSION);
        if (in_array($extension, $valid_extension)) {
            $upload_path = "../assets/AddPatent_data/" . $vidName;
            $Patent = $upload_path;
        } else {
            $res["error"] = true;
            $res["message"] = "Patent file must be one of the following types: PDF, PNG, JPG, MP4, MVA";
        }
    } else {
        $res["error"] = true;
        $res["message"] = "Must Select Patent";
    }
    if (isset($_FILES["imgdName"]["name"])) {
        $picName = $_FILES["imgdName"]["name"];
        $valid_extension = array("png", "jpg", "jpeg", "svg");
        $extension = pathinfo($picName, PATHINFO_EXTENSION);
        if (in_array($extension, $valid_extension)) {
            $logo_path = "../assets/logopatent/" . $picName;
            $imgName = $logo_path;
        } else {
            $res["error"] = true;
            $res["message"] = "Logo file must be one of the following types:  PNG, JPG, JPEG, SVG";
        }
    } else {
        $res["error"] = true;
        $res["message"] = "Must Select Logo";
    }

    if ($Patent != "" && $upload_path != ""&& $imgName !=""&& $logo_path !="") {
        $title = $_POST['title'];
        $arSummary = $_POST['arSummary'];
        $enSummary = $_POST['enSummary'];
        $pat_authenticator = $_POST['pat_authenticator'];
        $patNumper = $_POST['patNumper'];
        $inventorsData = $_POST['inventorsData'];
        $belongData = $_POST['belongData'];
        $RrlTechnology = $_POST['RrlTechnology'];
        $urlpatent = "AddPatent_data/" . $vidName;
        $urlpic = "logopatent/".$picName;

        if (move_uploaded_file($_FILES["patent"]["tmp_name"], $upload_path) && move_uploaded_file($_FILES["imgdName"]["tmp_name"], $logo_path)) {
            if (empty($title) || empty($arSummary) || empty($enSummary) || empty($pat_authenticator) || empty($patNumper)) {
                $res['error'] = true;
                $res['message'] = "Please fill in all the fields.";
            } else {
                $sql = "INSERT INTO `patents`(`pantent_Titel`, `InventorName`, `Belong`, `Authenticator`, `pantent_Number`, `summary_AR`, `summary_EN`, `Related_technology`,`logeImg`, `video_link`)
                        VALUES ('$title', '$inventorsData', '$belongData', '$pat_authenticator', '$patNumper', '$arSummary', '$enSummary', '$RrlTechnology', '$imgName','$urlpatent')";
                $result = $conn->query($sql);

                if ($result) {
                    $res["error"] = false;
                    $res["message"] = "The Patent has been uploaded.";
                } else {
                    $res["error"] = true;
                    $res["message"] = "Failed to load patent.";
                }
            }
        }else{
        $res["error"] = true;
        $res["message"] = "same thing is error!!!";
        }
    }else{
        $res["error"] = true;
        $res["message"] = "same thing is error?!!!";
    }
}







/**********************************************************************************(add suggestions)*************************************************************************************************** */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] === "addsuggestions") {
    // Validate and sanitize data
    $email=$_POST['email'];
    $name=$_POST['name'];
    $suggestionType=$_POST['suggestions'];
    if (!isset($_POST['Email']) || !isset($_POST['Name']) || !isset($_POST['suggestiontype']) || !isset($_POST['user_id'])) {
        $res = ['error' => true, 'message' => 'Required fields are missing'];
        // Handle errors appropriately
    }

    // ... (Additional data validation and sanitization as needed)

    // Prepare and execute INSERT query
    $sql = "INSERT INTO suggestion (Email, Name, suggestiontype, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $email, $name, $suggestionType, $userId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $res = ['success' => true, 'message' => 'Suggestion submitted successfully'];
    } else {
        $res = ['error' => true, 'message' => 'Error submitting suggestion: ' . $stmt->error];
    }

    // Close statement and return JSON response
    $stmt->close();
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}
/****************************************************************************(show Research)***************************************************************************************************************** */
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === "showResearch") {
    $sql = "SELECT * FROM resarsch";
    $result = $conn->query($sql);

    if ($result) {
        $ResearchData = [];
        while ($row = $result->fetch_assoc()) {
            array_push($ResearchData,$row);
        }
          $res["Researchs"]=$ResearchData;
    } else {
        $res = ['error' => true, 'message' => 'Error fetching suggestion data: ' . $conn->error];
    }

    // Return JSON response
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}

/***********************************************************************************************************(show users)*********************************************************************************************** */
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === "showUsers") {
    $sql = "SELECT user_id,full_name,Email,Phone,Qualifications,About,Specialization FROM users";
    $result = $conn->query($sql);

    if ($result) {
        $UserData = [];
        while ($row = $result->fetch_assoc()) {
            array_push($UserData,$row);
        }
          $res["Users"]=$UserData;
    } else {
        $res = ['error' => true, 'message' => 'Error fetching suggestion data: ' . $conn->error];
    }

    // Return JSON response
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}
/*****************************************************************************************************(show patent)******************************************************************************************************* */
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === "showPatent") {
    $sql = "SELECT * FROM patents";
    $result = $conn->query($sql);

    if ($result) {
        $PatentData = [];
        while ($row = $result->fetch_assoc()) {
            array_push($PatentData,$row);
        }
          $res["Patents"]=$PatentData;
    } else {
        $res = ['error' => true, 'message' => 'Error fetching suggestion data: ' . $conn->error];
    }

    // Return JSON response
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === "Patent") {
    $sql = "SELECT video_link FROM patents";
    $result = $conn->query($sql);

    if ($result) {
        $videolinkData = [];
        while ($row = $result->fetch_assoc()) {
            array_push($videolinkData,$row);
        }
          $res["video_link"]=$videolinkData;
    } else {
        $res = ['error' => true, 'message' => 'Error fetching suggestion data: ' . $conn->error];
    }

    // Return JSON response
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}
/***************************************************************************************************************(show User)***************************************************************************************************** */
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === "showUser") {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result) {
        $userData = [];
        while ($row = $result->fetch_assoc()) {
            unset($row['password']);
            array_push($userData,$row);
        }
          $res["users"]=$userData;
    } else {
        $res = ['error' => true, 'message' => 'Error fetching suggestion data: ' . $conn->error];
    }

    // Return JSON response
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}
/*************************************************************(contac-US)************************************************************************************************************* */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] === "create") {
    // Validate and sanitize data
    if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['phone']) || !isset($_POST['email'])) {
        $res = ['error' => true, 'message' => 'Required fields are missing'];
        // Handle errors appropriately
    }

    // ... (Perform data validation and sanitization)
      $firstName= $_POST['firstName'];
      $lastName= $_POST['lastName'];
      $email= $_POST['email'];
      $phone= $_POST['phone'];
      $myMessage= $_POST['myMessage'];
    // Prepare and execute INSERT query
    $sql = "INSERT INTO contactus (FirstName, LastName, Phone, Email,SuggestionsMess) VALUES ( $firstName, $lastName, $phone, $email,$myMessage )";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param( $firstName, $lastName, $phone, $email,$myMessage );
    //$stmt->execute();

    if ($stmt->affected_rows > 0) {
        $res = ['success' => true, 'message' => 'Contact information created successfully'];
    } else {
        $res = ['error' => true, 'message' => 'Error creating contact information: ' . $stmt->error];
    }

    // Close statement and return JSON response
    $stmt->close();
    header("Content-Type: application/json");
    echo json_encode($res);
    die();
}
/***********************************************************************************************************(updet user data)************************************************************************************* */
if ($action == "UpdateUser"){
    if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['jop']) && isset($_POST['phone'])&& isset($_POST['id'])) {
        // تحديث بيانات المستخدم
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $jop = $_POST['jop'];
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        // استعداد الاستعلام لتحديث البيانات
        $sql = "UPDATE users SET full_name = '$fullname', Email = '$email', Specialization = '$jop', Phone = '$phone' WHERE user_id = '$id'"; // تفترض أنه يتم تحديث المستخدم بناءً على العنصر الأول في قاعدة البيانات لأغراض التبسيط. يمكنك تعديله حسب الحالة الخاصة بك.
    
        if($conn->query($sql) === TRUE) {
            // نجاح التحديث
            $res = array(
                "error" => false,
                "message" => "User information updated successfully."
            );
            echo json_encode($res);
        } else {
            // فشل التحديث
            $res = array(
                "error" => true,
                "message" => "Error updating user information: " . $conn->error
            );
            echo json_encode($res);
        }
    } else {
        // إذا لم يتم إرسال بيانات
        $res = array(
            "error" => true,
            "message" => "Required fields are missing."
        );
        echo json_encode($res);
    }
    
   
}
/**************************************************************************************************************************(updat patent)******************************************************************************* */
if ($action === 'updatePatent') {
    // Retrieve POST data
    $patent_id = $_POST['patent_id'];
    $patent_Title = $_POST['patent_Title'];
    $ar_summary = $_POST['ar_summary'];
    $en_summary = $_POST['en_summary'];
    $related_technology = $_POST['related_technology'];

    // Validate data (you can add more validation as needed)

    // Example SQL UPDATE statement
    $sql = "UPDATE patents SET patent_Title = ?, ar_summary = ?, en_summary = ?, related_technology = ? WHERE patent_id = ?";

    // Assuming $pdo is your PDO database connection
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(1, $patent_Title);
    $stmt->bindParam(2, $ar_summary);
    $stmt->bindParam(3, $en_summary);
    $stmt->bindParam(4, $related_technology);
    $stmt->bindParam(5, $patent_id);

    // Execute statement
    if ($stmt->execute()) {
        // Return success response
        echo json_encode(['success' => true]);
    } else {
        // Return error response
        echo json_encode(['success' => false, 'error' => 'Failed to update patent']);
    }
} 
/**************************************************************************************************************************************************************************************************************************************/
if ($action === 'updateresearch') {
    
        // Retrieve POST data
        $research_id = $_POST['research_id'];
        $research_Title = $_POST['research_Title'];
        $ar_summary = $_POST['ar_summary'];
        $en_summary = $_POST['en_summary'];
        $related_technology = $_POST['related_technology'];

        // Validate data (you can add more validation as needed)

        // Example SQL UPDATE statement
        $sql = "UPDATE resarsch SET Title = ?, Summary_AR = ?, Summary_EN = ?, Related_technology = ? WHERE addResearsch_id  = ?";
        
        // Prepare statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $research_Title);
        $stmt->bindParam(2, $ar_summary);
        $stmt->bindParam(3, $en_summary);
        $stmt->bindParam(4, $related_technology);
        $stmt->bindParam(5, $research_id);

        // Execute statement
        if ($stmt->execute()) {
            // Return success response
            echo json_encode(['success' => true]);
        } else {
            // Return error response
            echo json_encode(['success' => false, 'error' => 'Failed to update patent']);
        }
}

header("Content-Type: application/json");
echo json_encode($res);
// Close the database connection
$conn->close();
die();
?>




