<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
</head>
<title>まっP</title>
<body>
    <ul class="insta_list">
    <?php
    $insta_media_limit = 10;
    $insta_business_id = ;
    $insta_access_token = '';

    $endpoint = "https://graph.facebook.com/v21.0/{$insta_business_id}?fields=business_discovery.username(bluebottle)%7Bname%2Cmedia.limit({$insta_media_limit})%7Bcaption%2Cmedia_url%2Cthumbnail_url%2Cpermalink%7D%7D&access_token={$insta_access_token}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($response, true);

        $insta = [];

    foreach ($obj['business_discovery']['media']['data'] as $k => $v) {
        $data = [
            'img' => $v['media_url'],
            'caption' => $v['caption'],
            'link' => $v['permalink'],
        ];
        $insta[] = $data;
    }
    foreach ($insta as $k => $v) {
        echo '<li><a href="' . $v['link'] . '"><img src="' . $v['img'] . '"></a></li>';
    }
    ?>
    </ul>
    <div class="insta_btn"><a href="https://www.instagram.com/bluebottle/">view more</a></div>
</body>
</html>
