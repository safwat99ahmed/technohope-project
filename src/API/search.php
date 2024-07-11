<?php
// إعداد الاتصال بقاعدة البيانات
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technohope";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// الحصول على الاستعلام من الطلب
$query = isset($_GET['q']) ? $_GET['q'] : '';

if (strlen($query) > 2) {
    // إعداد استعلام البحث
    $sql = $conn->prepare("SELECT * FROM your_table WHERE your_column LIKE ?");
    $likeQuery = "%" . $query . "%";
    $sql->bind_param("s", $likeQuery);
    $sql->execute();
    $result = $sql->get_result();

    $searchResults = array();
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    // إعادة النتائج بصيغة JSON
    echo json_encode($searchResults);
} else {
    echo json_encode([]);
}

// إغلاق الاتصال
$conn->close();*/
header('Content-Type: application/json');

// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technohope";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// الحصول على الإجراء من الطلب
$action = isset($_GET['action']) ? $_GET['action'] : '';

// التحقق من الإجراء
if ($action === 'searchit') {
    // الحصول على القيمة من الطلب
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    if (strlen($searchQuery) > 2) {
        // إعداد استعلام البحث
        $sql = $conn->prepare("
            SELECT patant.id AS id, patant.title AS title, patant.InventorName AS inventor_name, 'patant' AS source
            FROM patant
            WHERE patant.title LIKE ? OR patant.InventorName LIKE ?
            UNION
            SELECT research.id AS id, research.title AS title, '' AS inventor_name, 'research' AS source
            FROM research
            WHERE research.title LIKE ?
        ");
        $likeQuery = "%" . $searchQuery . "%";
        $sql->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
        $sql->execute();
        $result = $sql->get_result();

        $searchResults = [];
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }

        // إعادة النتائج بصيغة JSON
        echo json_encode($searchResults);
    } else {
        echo json_encode(["No results found."]);
    }
}

// إغلاق الاتصال
$conn->close();
?>
