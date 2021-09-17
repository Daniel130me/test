
<?php
//     $url = "https://newsapi.org/v2/top-headlines?country=ng&category=business&apiKey=05cdb8f5d86a492eb5197a1f7e88ee10";
//     $response = file_get_contents($url); //get the content
//     $newsData = json_decode($response);
// var_dump($newsData);
// echo "ll";

$opts = [
    'http' => [
            'method' => 'GET',
            'header' => [
                    'User-Agent: PHP'
            ]
    ]
];

$context = stream_context_create($opts);
$content = file_get_contents("https://api.github.com/repos/Daniel130me/test/commits?per_page=2", false, $context);
$data = json_decode($content);
// var_dump($data);
// var_dump($data)
// var_dump($data[1]->sha);
foreach($data as $dat) {
    $sha = $dat->sha;
    $name  = $dat->commit->author->name;
    $commit =  $dat->commit->message;
    $destinationUrl = "http://circunomics.rf.gd/new.php?action=insert-into-db&sha=$sha&author=$name&commit=$commit"
?>
    <script>
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xmlhttp.open("GET","<?=$destinationUrl?>",true);
    xmlhttp.send();
  

</script>
<?php
}
?>
<!-- hostname = sql212.epizy.com
username = epiz_29768811
dbname = epiz_29768811_circunomics
pass = RKhZNMg6g2kwS
?> -->
