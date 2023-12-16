# 履歴書の読み込みアプリ

## 紹介と使い方
  - APIの課題時に作成したものをDBに送信できるように作り直しました。(ファイル1) 
  - 一部中途半端なところがあるため、最低限の要件を満たしたブックマークアプリ（ファイル2）も提出いたします。
    
## 工夫した点
  - jpgデータを選択→選択したjpgデータに対してVision APIでテキスト検出を実行→必要な文字列を抽出→画面へ反映とした。
  - XAMPP上でPythonが実行できるよう試みた。（できなかった。現在はサポートが終了している。。？）
    - ”選択したjpgデータに対してVision APIでテキスト検出を実行”の処理をPythonで作成しているため、今回はあらかじめ処理を行ったデータを用意し、そこから文字列を検出するといった形で一時凌ぎを行った。

## 苦戦した点
  - XAMPP上でPythonが実行できるよう試みたが、どうしてもエラーがでてしまい実現できなかった。
  - 方向性を変え、Pythonで作成していた”選択したjpgデータに対してVision APIでテキスト検出を実行”の処理をPHPで書き直すといったことを試みた。
    - PHPでVision APIを使用する場合、PHPライブラリが必要とのことだった。
    - composerを使用し、ライブラリのインストールを行った。しかし、Google\Cloud\Vision\V1\ImageAnnotatorClient　このライブラリが見つからないといったエラーを解消することが一向にできなかった。

## 参考にした web サイトなど
  - https://jet-blog.com/python_run_on_xampp/
  - https://teratail.com/questions/6oluijfrdnz8xd
  - https://teratail.com/questions/iglk57hj0c57x1
  - https://magazine.techacademy.jp/magazine/22048
  - https://blue-bear.jp/kb/phpgoogle-cloud-vision-api%E3%82%92%E4%BD%BF%E7%94%A8%E3%81%97%E3%81%A6%E7%94%BB%E5%83%8F%E3%81%AE%E3%83%86%E3%82%AD%E3%82%B9%E3%83%88%E6%83%85%E5%A0%B1%E3%82%92%E6%8A%BD%E5%87%BA%E3%81%99%E3%82%8B/
  - https://field.asia/%E3%80%90%E4%B8%80%E6%92%83%E5%AE%9F%E8%A3%85%E3%80%91%E7%94%BB%E5%83%8F%E3%81%8B%E3%82%89%E3%83%86%E3%82%AD%E3%82%B9%E3%83%88%E6%A4%9C%E5%87%BAocr-%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9cloud-vision-ap/
  - https://softwarenote.info/p2783/
