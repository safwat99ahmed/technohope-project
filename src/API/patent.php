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
        $patentimg = null;
        if (isset($_FILES['patentimg']) && $_FILES['patentimg']['error'] === UPLOAD_ERR_OK) {
            $patentimg = $_FILES['patentimg']['tmp_name'];
        } else {
            $_SESSION['error'] = "Error uploading patent image file.";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
        
        $patent = null;
        if (isset($_FILES['patent']) && $_FILES['patent']['error'] === UPLOAD_ERR_OK) {
            $patent = $_FILES['patent']['tmp_name'];
        } else {
            $_SESSION['error'] = "Error uploading patent file.";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
        
        $response = $service->videos->insert(
            'snippet,status',
            $video,
            array(
                'data' => file_get_contents($patent),
                'mimeType' => $_FILES['patent']['type'],
                'uploadType' => 'multipart'
            )
        );
        $videoId = $response->id;
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
            $_SESSION['error'] = $e->getMessage();
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
 
    $conn = new mysqli($host_name, $host_user, $host_pass, $host_db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    
    $title = htmlspecialchars($arr_data['title']);
    $arSummary = htmlspecialchars($arr_data['arSummary']);
    $enSummary = htmlspecialchars($arr_data['ensummary']);
    $pat_authenticator = htmlspecialchars($arr_data['pat_authenticator']);
    $patNumper = htmlspecialchars($arr_data['patNumper']);
    $RrlTechnology = implode(',', $arr_data['RrlTechnology']); 
    $inventorsData = implode(',', $arr_data['inventorsData']);
    $belongData = implode(',', $arr_data['belongData']);
    
    $urlpatent = "AddPatent_data/" . basename($_FILES['patent']['name']);
    $urlpatentimg = "logopatent/" . basename($_FILES['patentimg']['name']);
    $upload_path_patent = "../assets/AddPatent_data/" . basename($_FILES['patent']['name']);
    $upload_path_patentimg = "../assets/logopatent/" . basename($_FILES['patentimg']['name']);
    
    if (empty($title) || empty($arSummary) || empty($enSummary) || empty($pat_authenticator) || empty($patNumper) || empty($RrlTechnology) || empty($urlpatent)) {
        $_SESSION['error'] = "Please fill in all the fields.";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    if (move_uploaded_file($_FILES['patent']['tmp_name'], $upload_path_patent) && move_uploaded_file($_FILES['patentimg']['tmp_name'], $upload_path_patentimg)) {
        $sql = "INSERT INTO `patents` (`pantent_Titel`, `InventorName`, `Belong`, `Authenticator`, `pantent_Number`, `summary_AR`, `summary_EN`, `Related_technology`, `logeImg`, `video_link`, `video_id`)
                VALUES ('$title', '$inventorsData', '$belongData', '$pat_authenticator', '$patNumper', '$arSummary', '$enSummary', '$RrlTechnology', '$urlpatentimg', '$urlpatent', '$videoId')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "The Patent has been uploaded.";
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
        'ensummary' => $_POST['enSummary'],
        'arSummary' => $_POST['arSummary'],
        'pat_authenticator' => $_POST['pat_authenticator'],
        'patNumper' => $_POST['patNumper'],
        'RrlTechnology' => $_POST['RrlTechnology'],
        'inventorsData' => $_POST['inventor_names'],
        'belongData' => $_POST['inventor_belongings']
    );
    upload_video_on_youtube($arr_data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patent</title>
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
            background-color: #4CAF50; /* لون الزرار */
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
            //window.location.href = '/Dashboard/Library';
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
                <h4>Add Patent</h4>
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
            <div class="form-row">  
                <!--<button class="back-button" @click="goBack">Back</button>-->
                <button class="back-button" onclick="goBack()">Back</button>
                <div id="title" class="mt-8">   
                    <h3 class="text-lg font-bold tracking-tight">Title:</h3>
                    <div class="mb-6">
                        <input type="text" id="title_input" name="title" placeholder="Enter video title" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg p-2.5" />
                    </div>
                </div>
                <div id="PatentLogo" class="mt-8">
                    <h3 class="text-lg font-bold tracking-tight">Logo:</h3>
                    <div class="mb-6">
                        <input
                            type="file"
                            name="patentimg"
                            id="logo_input"
                            accept="image/png, image/jpg, image/jpeg"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5"
                        />
                        <span class="text-gray-500">Only ( Png, Jpg, Jpeg)</span>
                    </div>
                </div>
                <!-- Section for Inventors -->
                <div id="Inventors" class="mt-8">
                    <h3 class="text-lg font-bold tracking-tight">Inventors:</h3>
                    <div class="mb-6">
                        <fieldset v-for="Num in inventorsNumber" :key="Num" class="border rounded p-4 mb-5">
                            <legend class="px-3 font-bold">Inventor {{ Num }}</legend>
                            <div class="mb-5">
                                <label :for="'inventor_name_' + Num" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                                <input
                                    type="text"
                                    v-model="inventorsData[Num - 1].name"
                                    :id="'inventor_name_' + Num"
                                    name="inventor_names[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                />
                            </div>
                            <div class="mb-5">
                                <label :for="'inventor_belonging_' + Num" class="block mb-2 text-sm font-medium text-gray-900">Belonging:</label>
                                <input
                                    type="text"
                                    v-model="inventorsData[Num - 1].belonging"
                                    :id="'inventor_belonging_' + Num"
                                    name="inventor_belongings[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                />
                            </div>
                        </fieldset>
                        <div class="btns">
                            <button
                                type="button"
                                @click="addInventor"
                                class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                            >
                                Add inventor
                            </button>
                            <button
                                type="button"
                                v-if="inventorsNumber > 1"
                                @click="removeInventor"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                            >
                                Remove inventor
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Other form fields here -->
                <div id="Summary" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Summary:</h3>
                <div class="mb-6">
                    <label for="arSummary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arabic summary:</label>
                    <textarea dir="rtl" id="arSummary" rows="10" name="arSummary" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"></textarea>
                </div>
                <div class="mb-6">
                    <label for="enSummary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">English summary:</label>
                    <textarea id="enSummary" rows="10" name="enSummary" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"></textarea>
                </div>
            </div>

            <div id="PatentNumber" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight mb-5">Patent number:</h3>
                <div class="mb-6">
                    <div class="mb-5">
                        <label for="patent_authenticator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The name of the authenticator:</label>
                        <input type="text" id="patent_authenticator" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" required name="pat_authenticator" />
                    </div>
                    <div class="mb-5">
                        <label for="patent_number_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patent number:</label>
                        <input type="text" id="patent_number_input" name="patNumper" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" required />
                    </div>
                </div>
            </div>
            
            <div id="Attachment" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Attachment:</h3>
                <div class="mb-6">
                    <label for="Attachment_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Attachment:
                    </label>
                    <input 
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                        id="Attachment_input" 
                        type="file" 
                        name="patent" 
                        title="Upload a file" 
                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.mp4" 
                    />
                    <small class="text-gray-500">Accepted file types: PDF, DOC, DOCX, JPG, JPEG, MP4</small>  
                </div>
            </div>

            <div id="Related_technology" class="mt-8">
                <h3 class="text-lg font-bold tracking-tight">Related technology:</h3>
                <span class="text-gray-500">(For multi-selection, hold down Ctrl key)</span>
                <div class="mb-6">
                    <label for="related_technology_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Related technology:
                    </label>
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
        </div>
        <input type="submit" name="submit" value="Submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
    </form>

    <script>
        new Vue({
            el: '#uploadForm',
            data: {
                inventorsNumber: 1,
                users: [],
                inventorsData: [{ name: '', belonging: '' }],
                user_id: null
            },
            methods: {
                goBack() {
      window.location.href = 'http://localhost:8080/Dashboard/Library';
    },
                addInventor() {
                    this.inventorsNumber++;
                    this.inventorsData.push({ name: '', belonging: '' });
                },
                removeInventor() {
                    if (this.inventorsNumber > 1) {
                        this.inventorsNumber--;
                        this.inventorsData.pop();
                    }
                },
            }
        });
    </script>
</body>
</html>

   