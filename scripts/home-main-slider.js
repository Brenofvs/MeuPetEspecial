const pics = document.querySelectorAll(".pic-thumb");
const mainBanner = document.getElementById("main-banner");
const mainBannerData = document.getElementById("main-banner-data");

//variável para saber o array da imagem
let i = 0;

//variável de tempo
let t = 0;

/* Função responsável por trocar a imagem que foi clicada */

function handleClick(pic, index) {
	//altera o valor de i para a imagem clicada para que as demais funções saibam qual array da imagem da vez
	i = index;

	//variável que armazena o src da imagem da vez
	let src = pic.src;

	//variável que armazena a imagem selecionada da vez
	let clickedPic = pic;

	//executar função para trocar a borda da imagem selecionada
	changeBorder(clickedPic);

	//trocar o src da imagem principal
	mainBanner.src = src;

	//voltar a variável que conta o tempo para 0
	t = 0;
}

/* Loop responsável por adicionar a função de clique em cada imagem */

pics.forEach((pic, index) => {
	pic.addEventListener("click", () => {
		handleClick(pic, index);
	});
});

/* Função responsável por trocar as imagens do slider principal */

function slideChange() {
	//variável i responsável por incrementar o valor do array das imagens
	i++;
	if (i > pics.length - 1) {
		//se o valor de i for maior que o último valor do array das imagens i volta a 0 (primeira imagem)
		i = 0;
	}

	//variável que armazena o src da imagem da vez
	let slideSrc = pics[i].src;

	//variável que armazena a imagem selecionada da vez
	let selectedPic = pics[i];

	//chama função de animação
	callAnimation();

	//define tempo suficiente para a animação ocorrer antes de executar as próximas tarefas
	setTimeout(() => {
		//executar função para trocar a borda da imagem selecionada
		changeBorder(selectedPic);
		//trocar o src da imagem principal
		mainBanner.src = slideSrc;
	}, 2000);
	//voltar a variável que conta o tempo para 0
	t = 0;
}

/* Função responsável por calcular o intervalo de tempo para troca dos slides */

function interval() {
	//sempre que a função for acionada irá somar +1 ao valor de T
	t++;
	if (t === 10) {
		//quando T for igual a 10 a função de troca de slides será acionada
		slideChange();
	}
}

//intervalo de tempo responsável por executar a função "interval" de forma repetida
setInterval(interval, 1000);

/* Função responsável por alterar a borda da imagem selecionada */
function changeBorder(selectedPic) {
	//loop para remover todas as classes
	pics.forEach((pic) => {
		pic.classList.remove("border");
	});
	//adicionar a classe para a imagem selecionada
	selectedPic.classList.add("border");
}

/* Função responsável por adicionar classes de animações quando o slide for trocado */

function callAnimation() {
	//adicionar classe da animação para sumir com conteúdo da matéria
	mainBannerData.classList.add("hide");

	//adicionar classe da animação fadeOut após 1s na imagem
	setTimeout(() => {
		mainBanner.classList.add("fadeout");
	}, 1000);

	//adicionar classe da animação fadeIn após 2s na imagem
	setTimeout(() => {
		mainBanner.classList.add("fadein");
	}, 2000);

	//adicionar classe da animação para exibir conteúdo da matéria após 3s
	setTimeout(() => {
		mainBannerData.classList.add("show");
	}, 3000);

	//remover todas as classes após 5s
	setTimeout(() => {
		mainBanner.classList.remove("fadeout");
		mainBanner.classList.remove("fadein");
		mainBannerData.classList.remove("hide");
		mainBannerData.classList.remove("show");
	}, 5000);
}
