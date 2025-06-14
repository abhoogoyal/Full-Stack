
<!DOCTYPE html>
<html>
<head>
    <title>HTML Translator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            color: darkgreen;
        }
        .container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        textarea, iframe {
            width: 45%;
            height: 300px;
            margin: 10px;
            font-size: 16px;
        }
        .btn {
            background-color: green;
            color: white;
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <table>
    <h1>HTML Translator</h1>
    <form method="post">
         <button type="submit" class="btn" formaction="translator.php" target="_self">RUN</button>
        <div class="container_fluid">
            
            <textarea name="text" placeholder="Here we write HTML code"><?php 
                echo isset($_POST['htmlCode']) ? htmlspecialchars($_POST['htmlCode']) : ''; 
            ?></textarea>
            <iframe name="outputFrame"></iframe>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["htmlCode"])) {
        $html = $_POST["htmlCode"];
        file_put_contents("output.html", $html);
        echo "<script>document.querySelector('iframe').src='output.html';</script>";
    }
    ?>
      </table>
</body>
</html>
