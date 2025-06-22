function toggleSubmenu() {
    const submenu = document.getElementById("has-submenu");
    submenu.classList.toggle("active");
  }
  
fetch("Navbar/navbar.html")
  .then(response => response.text())
  .then(data => {
    document.getElementById("navbar-container").innerHTML = data;
    // Aguarda um pequeno delay para garantir que os elementos estejam no DOM
    setTimeout(() => {
      atualizarNavbar(); // Chama a função após inserir o HTML
    }, 100);
  });

  let slideIndex = 0;
  const slides = document.querySelectorAll('.slide');

  function mostrarSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove('ativo');
      if (i === index) {
        slide.classList.add('ativo');
      }
    });
  }

  function moverSlide(direcao) {
    slideIndex += direcao;
    if (slideIndex < 0) slideIndex = slides.length - 1;
    if (slideIndex >= slides.length) slideIndex = 0;
    mostrarSlide(slideIndex);
  }

  // Mostrar primeiro slide ao carregar
  mostrarSlide(slideIndex);
  