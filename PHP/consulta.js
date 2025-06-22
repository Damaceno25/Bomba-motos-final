const inputNome = document.getElementById("inputNome");
const listaClientes = document.getElementById("listaClientes");

inputNome.addEventListener("input", () => {
  const nome = inputNome.value.trim();

  // Só faz a requisição se tiver pelo menos 2 caracteres
  if (nome.length < 2) {
    listaClientes.innerHTML = "";
    return;
  }

  fetch("PHP/consul-cliente.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "nome=" + encodeURIComponent(nome),
  })
    .then((response) => response.json())
    .then((clientes) => {
      listaClientes.innerHTML = ""; // limpa antes de atualizar

      if (clientes.length === 0) {
        listaClientes.innerHTML = "<li>Nenhum cliente encontrado.</li>";
        return;
      }

      clientes.forEach((cliente) => {
        const item = document.createElement("li");
        item.innerHTML = `
          <strong>Nome:</strong> ${cliente.nome}<br>
          <strong>Email:</strong> ${cliente.email}<br>
          <strong>Telefone:</strong> ${cliente.telefone}<br>
          <strong>Endereço:</strong> ${cliente.endereco}<br>
          <strong>Data de cadastro:</strong> ${cliente.criado_em}
        `;
        listaClientes.appendChild(item);
      });
    })
    .catch((erro) => {
      listaClientes.innerHTML = "<li>Erro na consulta.</li>";
      console.error("Erro na requisição:", erro);
    });
});
