const btnToggle = document.querySelector(".navbar #btn-toggle");
const sidebar = document.querySelector("#_sidebar");
const content = document.querySelector("#content");
btnToggle.addEventListener("click", function () {
	sidebar.classList.toggle("show");
	content.classList.toggle("slider");
});

// const dropdownToggle = document.getElementsByClassName("dropdown-toggle");
// const dropdown = document.querySelector(".sidebar .dropdown");
// for (let i = 0; i < dropdownToggle.length; i++) {
// 	dropdownToggle[i].addEventListener("click", function () {
// 		dropdown.classList.toggle("show");
// 		var dropdownContent = this.nextElementSibling;
// 		if (dropdownContent.style.display === "block") {
// 			dropdownContent.style.display = "none";
// 		} else {
// 			dropdownContent.style.display = "block";
// 		}
// 	});
// };

// $(function() {

// 	$(".navbar #btn-toggle").click(function() {

// 		$("#_sidebar").toggleClass("show");
// 		$("#content").toggleClass("slider");
// 		if ($(".navbar #btn-toggle i").hasClass("fa-bars")) {
// 			$(".navbar #btn-toggle i").removeClass("fa-bars");
// 			$(".navbar #btn-toggle i").addClass("fa-times");
// 		} else {
// 			$(".navbar #btn-toggle i").removeClass("fa-times");
// 			$(".navbar #btn-toggle i").addClass("fa-bars");
// 		}

// 	});

// 	$(".navbar-search-2 #search-toggle").click(function() {

// 		$(".navbar-search-2 .dropdown-menu").toggleClass("show");

// 	});

// 	$('.custom-file-input').on('change', function() {
// 		let fileName = $(this).val().split('\\').pop();
// 		$(this).next('.custom-file-label').addClass("selected").html(fileName);
// 	});

// 	$("#search").autocomplete({
// 		source: 'layout/search.php'
// 	});

// 	$("#search2").autocomplete({
// 		source: 'layout/search.php'
// 	});

// });