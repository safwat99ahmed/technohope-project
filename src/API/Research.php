<?php
session_start();
require_once 'config.php';
//require_once 'db.php';

 
function upload_video_on_youtube($arr_data) {
    $client = new Google_Client();
    $db = new DB();
    
    $arr_token = (array) $db->get_access_token();
    $accessToken = array(
        'access_token' => $arr_token['access_token'],
        'expires_in' => $arr_token['expires_in'],
    );
    
    $client->setAccessToken($accessToken);
    
    $service = new Google_Service_YouTube($client);
    
    $video = new Google_Service_YouTube_Video();
    
    $videoSnippet = new Google_Service_YouTube_VideoSnippet();
    $videoSnippet->setDescription($arr_data['ensummary']);
    $videoSnippet->setTitle($arr_data['title']);
    $video->setSnippet($videoSnippet);
    
    $videoStatus = new Google_Service_YouTube_VideoStatus();
    $videoStatus->setPrivacyStatus('private');
    $video->setStatus($videoStatus);
    
    try {
        $imgattac = null;
        if (isset($_FILES['imgattac']) && $_FILES['imgattac']['error'] === UPLOAD_ERR_OK) {
            $imgattac = $_FILES['imgattac']['tmp_name'];
        } else {
            $_SESSION['error'] = "Error uploading Research image file.";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
        
        $attachment = null;
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
            $attachment = $_FILES['attachment']['tmp_name'];
        } else {
            $_SESSION['error'] = "Error uploading attachment file.";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
        
        $response = $service->videos->insert(
            'snippet,status',
            $video,
            array(
                'data' => file_get_contents($attachment),
                'mimeType' => $_FILES['attachment']['type'],
                'uploadType' => 'multipart'
            )
        );
        $videoId = $response->id;

        // Insert other data into your database
        insert_into_database($arr_data, $videoId);

        $_SESSION['success'] = "Video uploaded successfully. Video ID is ". $videoId;
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } catch(Exception $e) {
        if( 401 == $e->getCode() ) {
            $refresh_token = $db->get_refersh_token();
 
            $client = new GuzzleHttp\Client(['base_uri' => 'https://accounts.google.com']);
 
            $response = $client->request('POST', '/o/oauth2/token', [
                'form_params' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token,
                    "client_id" => GOOGLE_CLIENT_ID,
                    "client_secret" => GOOGLE_CLIENT_SECRET,
                ],
            ]);
 
            $data = (array) json_decode($response->getBody());
            $data['refresh_token'] = $refresh_token;
 
            $db->update_access_token(json_encode($data));
 
            upload_video_on_youtube($arr_data);
        } else {
            $_SESSION['error'] = $e->getMessage(); //print the error just in case your video is not uploaded.
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }
}

function insert_into_database($arr_data, $videoId) {
 $host_name ="localhost";
 $host_user ="root";
 $host_pass="";
 $host_db="technohope";
 
$conn = new mysqli ($host_name,$host_user,$host_pass,$host_db);



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
    // Sanitize and validate data (example using htmlspecialchars for basic sanitation)
    $title = htmlspecialchars($arr_data['title']);
    $arSummary = htmlspecialchars($arr_data['arsummary']);
    $enSummary = htmlspecialchars($arr_data['ensummary']);
    $researchLink = htmlspecialchars($arr_data['researchLink']);
    $RrlTechnology = implode(',', $arr_data['RrlTechnology']); // Convert array to comma-separated string
    $researchersData = implode(',', $arr_data['researchersData']);
    $belongData = implode(',', $arr_data['belongData']);
    // Construct URLs for database storage
    $urlpatent = "AddResearch_data/" . basename($_FILES['attachment']['name']); // Assuming video_path is from file upload
    $urlpatentimg = "picResearch/" . basename($_FILES['imgattac']['name']); // Assuming video_path is from file upload
    $upload_path_patent = "../assets/AddResearch_data/" . basename($_FILES['attachment']['name']);
    $upload_path_patentimg = "../assets/picResearch/" . basename($_FILES['imgattac']['name']);
    
    // Check if all required fields are provided
    if (empty($title) || empty($arSummary) || empty($enSummary) || empty($pat_authenticator) || empty($patNumper) || empty($RrlTechnology) || empty($urlpatent)) {
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    // Move uploaded file to destination
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $upload_path_patent) && move_uploaded_file($_FILES['imgattac']['tmp_name'],$upload_path_patentimg)) {
        // Insert data into database
        $sql = "INSERT INTO `resarsch` (`Titel`,`Researchers`, `belong`, `Research_Link`, `pantent_Number`, `summary_AR`, `summary_EN`, `Related_technology`, `picResarch`, `attachmentFile`,`video_id`)
                VALUES ('$title','$researchersData', '$belongData', '$researchLink', '$patNumper', '$arSummary', '$enSummary', '$RrlTechnology', '$urlpatentimg' , '$urlpatent' ,'$videoId')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "The resarsch has been uploaded.";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    } else {
           $_SESSION['error'] = "Failed to move uploaded file.";
           header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
}

if (isset($_POST['submit'])) {
    $arr_data = array(
        'title' => $_POST['title'],
        'ensummary' => $_POST['ensummary'],
        'arsummary' => $_POST['arsummary'],
        'researchLink' => $_POST['researchLink'],
        'RrlTechnology' => $_POST['RrlTechnology'],// Assuming RrlTechnology is an array
        'researchersData' => $_POST['researcher_name'],
        'belongData' => $_POST['researcher_belongings']
    );
    upload_video_on_youtube($arr_data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Research</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <style>
        .header {
            background-color: #f4f4f4;
            color: black;
            padding: 10px 20px;
            text-align: center;
            font-size: 23px;
        }
        .header h4 {
            font-weight: bold; 
        }
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 3px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }
        .loading-spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #3498db;
            width: 50px;
            height: 50px;
            animation: spin 1s infinite linear;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <script>
        function closeAlert(element) {
            element.parentElement.style.display = 'none';
        }
        
        function showLoading() {
            document.getElementById('loadingMessage').style.display = 'block';
            document.getElementById('loadingSpinner').style.display = 'block';
        }

        function hideLoading() {
            document.getElementById('loadingMessage').style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'none';
        }

        function goBack() {
            //window.history.back();
            window.location.href = 'http://localhost:8080/Dashboard/Library';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('uploadForm');
            form.addEventListener('submit', function() {
                showLoading();
            });
        });
    </script>
</head>
<body>
    <form id="uploadForm" method="post" enctype="multipart/form-data" class="p-8">
        <div class="container mt-3 border border-dark rounded">  
            <div class="header">
                <h4>Add Research</h4>
            </div>
            <?php
               if (isset($_SESSION['success'])) {
                   echo '<div class="bg-green-500 text-white p-4 mb-4 relative"><span onclick="closeAlert(this)" class="absolute top-0 right-0 px-4 py-3 cursor-pointer">×</span>'.$_SESSION['success'].'</div>';
                   unset($_SESSION['success']);
                }
               if (isset($_SESSION['error'])) {
                   echo '<div class="bg-red-500 text-white p-4 mb-4 relative"><span onclick="closeAlert(this)" class="absolute top-0 right-0 px-4 py-3 cursor-pointer">×</span>'.$_SESSION['error'].'</div>';
                   unset($_SESSION['error']);
                }
            ?>
            <button class="back-button" onclick="goBack()">Back</button>

            <div id="title" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Title:</h3>
                <div class="mb-6">
                    <input
                        type="text"
                        id="title_input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        required
                        name="title"
                    />
                </div>
            </div>

            <div id="Researchers" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Researchers:</h3>
                <div class="mb-6">
                    <fieldset v-for="Num in researchersNumber" :key="Num" class="border rounded p-4 mb-5">
                        <legend class="px-3 font-bold">Researcher {{ Num }}</legend>
                        <div class="mb-5">
                            <label for="'researcher_name_' + Num" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                            <input
                                type="text"
                                v-model="researchersData[Num - 1].name"
                                :id="'researcher_name_' + Num"
                                name='researcher_name[]'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            />
                        </div>
                        <div class="mb-5">
                            <label for="'researcher_belonging_' + Num" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Belonging:</label>
                            <input
                                type="text"
                                v-model="researchersData[Num - 1].belonging"
                                :id="'researcher_belonging_' + Num"
                                name='researcher_belonging[]'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            />
                        </div>
                    </fieldset>
                    <div class="btns">
                        <button
                            type="button"
                            @click="addResearcher"
                            class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                        >
                            Add researcher
                        </button>
                        <button
                            type="button"
                            v-if="researchersNumber > 1"
                            @click="removeResearcher"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                        >
                            Remove researcher
                        </button>
                    </div>
                </div>
            </div>

            <div id="Summary" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Summary:</h3>
                <div class="mb-6">
                    <label for="arSummary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arabic summary:</label>
                    <textarea
                        dir="rtl"
                        id="arSummary"
                        rows="10"
                        name="arsummary"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    ></textarea>
                </div>
                <div class="mb-6">
                    <label for="enSummary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">English summary:</label>
                    <textarea
                        id="enSummary"
                        rows="10"
                        name="ensummary"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    ></textarea>
                </div>
            </div>

            <div id="researchLink" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight mb-5">Paper link:</h3>
                <div class="mb-6">
                    <input
                        type="url"
                        id="research_link_input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        required
                        name="researchLink"
                    />
                </div>
            </div>

            <div id="Attachment" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Attachment:</h3>
                <div class="mb-6">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="Attachment_input"
                        type="file"
                        name="attachment"
                    />
                </div>
            </div>

            <div class="mb-6">
                <input
                    type="file"
                    id="logo_input"
                    accept="image/png, image/jpg, image/jpeg"
                    name="imgattac"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                />
                <span class="text-gray-500">Only (Png, Jpg, Jpeg)</span>
            </div>

            <div id="Related_technology" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Related technology:</h3>
                <span class="text-gray-500">(For multi-selection, hold down Ctrl key)</span>
                <div class="mb-6">
                    <label for="related_technology_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Related technology:</label>
                    <select multiple name="RrlTechnology[]" id="related_technology_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full h-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" title="Select related technologies" aria-describedby="technologyHelp">
                        <optgroup class="font-bold" label="Computer science:">
                            <option value="Artificial Intelligence (AI)">Artificial Intelligence (AI)</option>
                            <option value="Information Technology (IT)">Information Technology (IT)</option>
                            <option value="Software development">Software development</option>
                            <option value="Communication Technology">Communication Technology</option>
                            <option value="Data technology">Data technology</option>
                        </optgroup>
                        <optgroup class="font-bold mt-3" label="Electrical and electronic engineering:">
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Electronic Engineering">Electronic Engineering</option>
                            <option value="Power Engineering">Power Engineering</option>
                        </optgroup>
                        <optgroup class="font-bold mt-3" label="Medicine and health:">
                            <option value="Medical Imaging Technology">Medical Imaging Technology</option>
                            <option value="Medical Devices Technology">Medical Devices Technology</option>
                            <option value="Prosthetics and Artificial Organs Technology">Prosthetics and Artificial Organs Technology</option>
                            <option value="Tissue Engineering">Tissue Engineering</option>
                        </optgroup>
                        <optgroup class="font-bold mt-3" label="Energy and environmental technology:">
                            <option value="Renewable Energy Technology">Renewable Energy Technology</option>
                            <option value="Nuclear Energy Technology">Nuclear Energy Technology</option>
                            <option value="Thermal Energy Technology">Thermal Energy Technology</option>
                            <option value="Energy Management Technology">Energy Management Technology</option>
                            <option value="Waste Management Technology">Waste Management Technology</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <input type="submit" name="submit" value="Submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
        </div>           
    </form>

    <script>
        new Vue({
            el: '#uploadForm',
            data: {
                researchersNumber: 1,
                researchersData: [{ name: '', belonging: '' }]
            },
            methods: {
                addResearcher() {
                    this.researchersNumber++;
                    this.researchersData.push({ name: '', belonging: '' });
                },
                removeResearcher() {
                    if (this.researchersNumber > 1) {
                        this.researchersNumber--;
                        this.researchersData.pop();
                    }
                },
            }
        });
    </script>
</body>
</html>
