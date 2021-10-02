 //ファイル画像アップロード時に表示
 window.addEventListener("DOMContentLoaded", function () {　　　　　　 //ファイルが保存されているか確認
 	let result = document.getElementById("result");
 	//ファイルのパスを取得
 	let src = result.attributes.item(0).value;
 	//画像がセットされていなければ
 	if (src === "") {
 		result.setAttribute("src", "upload/user_pic.jpg");
 	}
 	document.getElementById("file").addEventListener("change", function () {
 		let input = document.getElementById("file").files[0];
 		let reader = new FileReader();
 		reader.addEventListener("load", function () {
 			let result = document.getElementById("result")
 			result.src = reader.result;
 			let desc = document.getElementById("file_desc");
 			desc.textContent = "アップロード成功";
 			desc.style.color = "#e6af09"; {}
 		}, true);
 		reader.readAsDataURL(input);
 	});
 })
 const btn = document.querySelector(".file_label ");
 btn.addEventListener("mouseover", function () {
 	btn.style.color = "#e8d633";
 })
 btn.addEventListener("mouseleave", function () {
 	btn.style.color = "#d29f08";
 })
 //プルダウンメニュー
 let val = $("#php_age").val();
 if (val == "") {
 	console.log("からです");
 	for (let i = 0; i <= 100; i++) {
 		$("#age").append("<option value=" + i + ">" + i + "歳</option>");
 	}
 } else {
 	for (let i = parseInt(val) - 1; i > 0; i--) {
 		$("#age").prepend("<option value=" + i + ">" + i + "歳</option>");
 	}
 	for (let i = parseInt(val) + 1; i <= 100; i++) {
 		$("#age").append("<option value=" + i + ">" + i + "歳</option>");
 	}
 }