function toggleMenu() {
  const menu = document.querySelector(".menu ul");
  menu.classList.toggle("active");
}


  document.querySelector('.dropbtn').addEventListener('click', function(event) {
    var dropdownContent = document.querySelector('.dropdown-content');
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    event.stopPropagation(); // Impede que o clique feche o menu imediatamente
  });

  // Fecha o dropdown se o usuário clicar fora dele
  document.addEventListener('click', function(event) {
    var dropdownContent = document.querySelector('.dropdown-content');
    if (!event.target.closest('.dropdown')) {
      dropdownContent.style.display = 'none';
    }
  });


  
  
