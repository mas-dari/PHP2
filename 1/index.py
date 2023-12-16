#visionをインポート
from google.cloud import vision
import json

#image.jpgを開いて読み込む
with open('/Applications/XAMPP/xamppfiles/htdocs/gs_code/231209/API_PHP/resume.sample.jpg', 'rb') as image_file:
	content = image_file.read()

#vision APIが扱える画像データにする
image = vision.Image(content=content)

#ImageAnnotatorClientのインスタンスを生成
annotator_client = vision.ImageAnnotatorClient()

# テキスト検出実行
response_data = annotator_client.text_detection(image=image)
texts = response_data.text_annotations
response_label = annotator_client.label_detection(image=image)
labels = response_label.label_annotations

# # print('----RESULT----')
# for text in texts:
# 	print(text.description)

# 結果をJSON形式で出力
result_json = []
for text in texts:
    result_json.append({
        'description': text.description,
        'bounding_box': [{'x': vertex.x, 'y': vertex.y} for vertex in text.bounding_poly.vertices],
        'confidence': text.confidence,
        'locale': text.locale,
    })
for label in labels:
    result_json.append({
        'type': label.description,
    })

# JSONデータを標準出力に書き込む
print(json.dumps(result_json, indent=2))

with open('result.json', 'w') as json_file:
    json.dump(result_json, json_file, indent=4)

print("スクリプトが正常に終了しました。")
