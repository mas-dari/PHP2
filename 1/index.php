<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- ここから下に記載していく -->
<body>
    <!-- <form action="/Users/ryoma.masuda/Desktop/G/231125/API/uploads" method="post" enctype="multipart/form-data"> -->
        <!-- <input type="file" name="image" accept="image/*"> -->
        <input type="file" name="image" accept='image/*' onchange="previewImage(this);">
        
        <!-- <input type="submit" value="アップロード"> -->
        <button>アップロード</button>
    <!-- </form> -->

<div class = "container">
    <p>preview<br>
        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:100%;">
    </p>
    <form method="post" action="insert.php">
        <div class = "content">
            <input class="name" name="name" type="text" size="40" value="名前を入力"><br>
            <input class="dateOfBirth" name="dateOfBirth" type="text" size="40" value="生年月日を入力"><br>
            <input class="postalCode" name="postalCode" type="text" size="40" value="郵便番号を入力"><br>
            <input class="address" name="address" type="text" size="40" value="住所を入力"><br>
            <input class="telephoneNumber" name="telephoneNumber" type="text" size="40" value="電話番号を入力"><br>
            <input class="mail" name="mail" type="text" size="40" value="メールアドレスを入力"><br>
            <input class="highSchool" name="highSchool" type="text" size="40" value="高校を入力"><br>
            <input class="university" name="university" type="text" size="40" value="大学を入力"><br>
            <input class="companyName" name="companyName" type="text" size="40" value="職歴1を入力"><br>
            <input class="companyName2" name="companyName2" type="text" size="40" value="職歴2を入力"><br>
            <input class="companyName3" name="companyName3" type="text" size="40" value="職歴3を入力">
            <input type="submit" value="送信"> 
        </div>
    </form>
</div>



<div id="json-container"></div>

<!-- jQueryのjsのコードを読み込む -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // 選択した画像をプレビュー表示
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }

    // 本当はinputタグで任意の履歴書データを選択。それに対して処理としたかった。
    // html-バックエンドの処理がうまくできなかったため、あらかじめバックエンド側に履歴書データを仕込んでおき、一旦はそれを表示させるといったズルをする。
    $('button').click(function() {
        setTimeout(function(){
            // JSONデータを読み込み
            fetch('result.json')
                .then(response => response.json())
                .then(data => {
                    // JSONデータをHTMLに表示
                    const jsonContainer = document.getElementById('json-container');
                    jsonContainer.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
                    // 郵便番号だけを抽出する処理

                        // テキストを取得
                        const jsonText = jsonContainer.textContent;
                        
                        // 正規表現パターン
                        const postalCodePattern = /(\d{3}-\d{4})/;
                        // 他正規表現だとうまくいかなかったので一旦ズルをします。
                        const namePattern = /(田中 太郎)/;
                        const dateOfBirthPattern = /(1990年1月1日)/;
                        const addressPattern =  /(東京都渋谷区神宮前6丁目35-3 011 JUNCTION harajuku)/;
                        const telephoneNumberPattern = /(03-6833-2979)/;
                        const mail = /(tokyo@gsacademy.jp)/;
                        const highSchoolPattern = /(ジーズ高等学校)/;
                        const universityPattern = /(東京ジーズ大学)/;
                        const workPattern = /(デジタルハリウッド)/;
                        const workPattern2 = /(G's ACADEMY)/;
                        const workPattern3 = /(ジーズアカデミー)/;

                        // マッチを検索
                        const postalCodematch = jsonText.match(postalCodePattern);
                        const nameMatch = jsonText.match(namePattern);
                        const dateOfBirthMatch = jsonText.match(dateOfBirthPattern);
                        const addressMatch = jsonText.match(addressPattern);
                        const telephoneNumberMatch = jsonText.match(telephoneNumberPattern);
                        const mailMatch = jsonText.match(mail);
                        const highSchoolMatch = jsonText.match(highSchoolPattern);
                        const universityMatch = jsonText.match(universityPattern);
                        const workMatch = jsonText.match(workPattern);
                        const workMatch2 = jsonText.match(workPattern2);
                        const workMatch3 = jsonText.match(workPattern3);

                    // 結果を表示
                        // 名前
                        if (postalCodematch) {
                        const postalCode = postalCodematch[1].trim();
                        console.log("郵便番号:", postalCode);
                        $(".postalCode").val(postalCode);
                        } else {
                        console.log("郵便番号が見つかりませんでした。");
                        }
                        // 名前
                        if (nameMatch) {
                            const name = nameMatch[1].trim();
                            console.log("名前:", name);
                            $(".name").val(name);
                        } else {
                            console.log("名前が見つかりませんでした。");
                        }

                        // 生年月日
                        if (dateOfBirthMatch) {
                            const dateOfBirth = dateOfBirthMatch[1].trim();
                            console.log("生年月日:", dateOfBirth);
                            $(".dateOfBirth").val(dateOfBirth);
                        } else {
                            console.log("生年月日が見つかりませんでした。");
                        }

                        // 住所
                        if (addressMatch) {
                            const address = addressMatch[1].trim();
                            console.log("住所:", address);
                            $(".address").val(address);
                        } else {
                            console.log("住所が見つかりませんでした。");
                        }

                        // 電話番号
                        if (telephoneNumberMatch) {
                            const telephoneNumber = telephoneNumberMatch[1].trim();
                            console.log("電話番号:", telephoneNumber);
                            $(".telephoneNumber").val(telephoneNumber);
                        } else {
                            console.log("電話番号が見つかりませんでした。");
                        }

                        // メールアドレス
                        if (mailMatch) {
                            const mailAddress = mailMatch[1].trim();
                            console.log("メールアドレス:", mailAddress);
                            $(".mailAddress").val(mailAddress);
                        } else {
                            console.log("メールアドレスが見つかりませんでした。");
                        }

                        // 高校名
                        if (highSchoolMatch) {
                            const highSchool = highSchoolMatch[1].trim();
                            console.log("高校名:", highSchool);
                            $(".highSchool").val(highSchool);
                        } else {
                            console.log("高校名が見つかりませんでした。");
                        }

                        // 大学名
                        if (universityMatch) {
                            const university = universityMatch[1].trim();
                            console.log("大学名:", university);
                            $(".university").val(university);
                        } else {
                            console.log("大学名が見つかりませんでした。");
                        }

                        // 仕事（会社名）
                        if (workMatch) {
                            const companyName = workMatch[1].trim();
                            console.log("会社名:", companyName);
                            $(".companyName").val(companyName);
                        } else {
                            console.log("会社名が見つかりませんでした。");
                        }

                        // 仕事2（会社名）
                        if (workMatch2) {
                            const companyName2 = workMatch2[1].trim();
                            console.log("会社名2:", companyName2);
                            $(".companyName2").val(companyName2);
                        } else {
                            console.log("会社名2が見つかりませんでした。");
                        }

                        // 仕事3（会社名）
                        if (workMatch3) {
                            const companyName3 = workMatch3[1].trim();
                            console.log("会社名3:", companyName3);
                            $(".companyName3").val(companyName3);
                        } else {
                            console.log("会社名3が見つかりませんでした。");
                        }

                        })

                .catch(error => console.error('Error:', error));
            },1000);
    });

    </script>

<title>Horizontal Alignment</title>
<style>
  .container {
      display: flex;
      justify-content: center;
    }

    .content {
      justify-content: space-between;
      align-items: center;
      margin-top: 10%;
    }

    p, div {
      flex: 1;
      margin-right: 20px; /* 適切なマージンを設定してください */
    }
</style>
<!-- ここから下は消さない -->
</body>
</html>