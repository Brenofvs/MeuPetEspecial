<main id="home" class="contato-body load-animation">
    <div class="contato-background"></div>
    <div class="historia-title container">
        <p class="font-text-m cor-8">Quer compartilhar sua história conosco?</p>
        <h1 class="home-title font-title-xl">Envie Sua História.</h1>
    </div>

    <div class="form-bg container">
        <div class="content">
            <p class="font-text-l">Viu quantas histórias lindas de leitores e a superação com seus pets? Tem uma história assim também? Compartilhe conosco! Basta preencher o formulário ao lado e sua história pode virar matéria na página!
            </p>
            <img src="./imagens/logo/meupetw-logo.svg" alt="logotipo">
        </div>
        <div class="form">
            <form action="">
                <div class="nome">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu Nome" required>
                </div>
                <div class="telefone">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" placeholder="(99) 99999-9999" required>
                </div>
                <div class="email col">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seuemail@email.com" required>
                </div>
                <div class="selects col">
                    <div class="nome-pet">
                        <label for="nomePet">Nome do Pet</label>
                        <input type="text" id="nomePet" name="nomePet" placeholder="Nome do Seu Pet" required>
                    </div>
                    <div class="idadePet">
                        <label for="idadePet">Idade do Pet</label>
                        <select name="idadePet" id="idadePet" required>
                            <option value="" selected disabled>Selecione...</option>
                            <option value="1">1 ano</option>
                            <option value="2">2 anos</option>
                            <option value="3">3 anos</option>
                            <option value="4">4 anos</option>
                            <option value="5">5 anos</option>
                            <option value="6">6 anos</option>
                            <option value="7">7 anos</option>
                            <option value="8">8 anos</option>
                            <option value="9">9 anos</option>
                            <option value="10">10 anos</option>
                            <option value="11">11 anos</option>
                            <option value="12">12 anos</option>
                            <option value="13">13 anos</option>
                            <option value="14">14 anos</option>
                            <option value="15+">15 anos ou mais</option>
                        </select>
                    </div>
                    <div class="sexPet">
                        <label for="sexPet">Sexo do Pet</label>
                        <select name="sexPet" id="sexPet" required>
                            <option value="" disabled selected>Selecione...</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="mensagem col">
                    <label for="mensagem">Mensagem</label>
                    <textarea type="text" id="mensagem" name="mensagem" placeholder="Digite aqui a sua história!" required></textarea>
                </div>
                <button class="botao col">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</main>