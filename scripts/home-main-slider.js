const pics = document.querySelectorAll(".pic-thumb");
const mainBanner = document.getElementById("main-banner");
const mainBannerData = document.getElementById("main-banner-data");
let i = 0;
let t = 0;

function handleClick(pic, index) {
	i = index;
	let src = pic.src;
	/* callAnimation();
	setTimeout(() => {
		
	}, 2000); */
	mainBanner.src = src;
	t = 0;
}

pics.forEach((pic, index) => {
	pic.addEventListener("click", () => {
		handleClick(pic, index);
	});
});

function slideChange() {
	i++;
	if (i > pics.length - 1) {
		i = 0;
	}

	let slideSrc = pics[i].src;
	callAnimation();
	setTimeout(() => {
		mainBanner.src = slideSrc;
	}, 2000);
	t = 0;
}

function interval() {
	t++;
	if (t === 2) {
		slideChange();
	}
}

setInterval(interval, 5000);

function callAnimation() {
	mainBannerData.classList.add("hide");
	setTimeout(() => {
		mainBanner.classList.add("fadeout");
	}, 1000);

	setTimeout(() => {
		mainBanner.classList.add("fadein");
	}, 2000);

	setTimeout(() => {
		mainBannerData.classList.add("show");
	}, 3000);

	setTimeout(() => {
		mainBanner.classList.remove("fadeout");
		mainBanner.classList.remove("fadein");
		mainBannerData.classList.remove("hide");
		mainBannerData.classList.remove("show");
	}, 5000);
}
