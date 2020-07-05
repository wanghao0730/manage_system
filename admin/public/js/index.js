//! 后台界面的特效
$(document).ready(function () {
		
	
    const dt_list = $(".nav-list dt");
    let index = 0;
    dt_list.click(function () {
        $(this).siblings("dt").next("dd").slideUp("3000");
        $(this).next("dd").slideDown("2000");
    });
		
		// $(window).resize(function(event){
		// 	let winWidth = window.innerWidth;
		// 	if (winWidth <= 800){
		// 		$(".nav").slideDown("slow").css({
		// 			display:"flex",
		// 			width:"100%"
		// 		})
		// 	}
		// })
		let clickValue =0;
		$(".header>.icon-menus").click(function(){
			clickValue++;
			if(!clickValue %2 ===0){
				$(".nav").slideDown("slow").css({
					display:"flex",
					width:"100%"
				})
			}
		})
});