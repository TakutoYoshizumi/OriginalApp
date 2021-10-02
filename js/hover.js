$(function () {
	// hoverアニメーション
	$(".addHover").mouseenter(function () {
		$(this).toggleClass("hover");
	})
	$(".addHover").mouseleave(function () {
		$(this).toggleClass("hover");
	})
	// タグ
	$(".nav").each(function () {
		const btn = $(this).find(".nav_btn");
		const i = $(this).find(".toggle");
		btn.click(function (e) {
			e.preventDefault();
			i.toggleClass("hide");
		})
	});
});