
<?php
// تأكد من وجود بيانات المدخلة
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // قم بتنفيذ العمليات الأمنية اللازمة على البيانات المدخلة هنا

    // التأكد من اتصال بقاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "Hesham123";
    $dbname = "project";

    $conn = new mysqli($localhost, $root, $Hesham123, $project);

    // التحقق من نجاح الاتصال بقاعدة البيانات
    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    // قم بإنشاء استعلام SQL المعدّل
    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";

    // قم بإعداد تعبير الاستعلام المعالج
    $stmt = $conn->prepare($sql);

    // ربط المتغيرات بتعبير الاستعلام
    $stmt->bind_param("ss", $name, $email);

    // تنفيذ استعلام الإدخال
    if ($stmt->execute()) {
        echo "تم إدخال البيانات بنجاح.";
    } else {
        echo "حدث خطأ أثناء إدخال البيانات: " . $stmt->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $stmt->close();
    $conn->close();
} else {
    echo "يرجى تقديم بيانات صحيحة.";
}
?>
