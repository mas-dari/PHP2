<?php

// APIキーを設定
    // Base64 エンコードされた文字列を取得
    $encoded_key = file_get_contents('groovy-medium-406301-1347f29935c3.json');

    // Base64 エンコードされた文字列をデコード
    $decoded_key = base64_decode($encoded_key);

    // キーを取得
    $api_key = trim($decoded_key);

// 画像ファイルを開く
$image_file = fopen('resume.sample.jpg', 'rb');

// 画像データを取得
$image_data = fread($image_file, filesize('resume.sample.jpg'));

// Vision APIクライアントを生成
$vision = new Google\Cloud\Vision\V1\ImageAnnotatorClient($api_key);

// テキスト検出を実行
$response = $vision->textDetection($image_data);

// テキスト検出結果を取得
$texts = $response->textAnnotations();

// 結果をJSON形式で出力
$result_json = [];
foreach ($texts as $text) {
    $result_json[] = [
        'description' => $text->description(),
        'bounding_box' => [
            'x' => $text->boundingPoly()->vertices()[0]->x(),
            'y' => $text->boundingPoly()->vertices()[0]->y(),
        ],
        'confidence' => $text->confidence(),
        'locale' => $text->locale(),
    ];
}

// JSONデータを標準出力に書き込む
echo json_encode($result_json, JSON_PRETTY_PRINT);

// 画像ファイルを閉じる
fclose($image_file);

// スクリプト終了
echo 'スクリプトが正常に終了しました。';
?>