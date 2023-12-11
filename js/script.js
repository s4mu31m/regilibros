function filterList() {
    var input, filter, ul, li, i, txtValue;
    input = document.getElementById('searchBar');
    filter = input.value.toUpperCase();
    ul = document.getElementById('list');
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        txtValue = li[i].textContent || li[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].classList.remove('hidden');
        } else {
            li[i].classList.add('hidden');
        }
    }
    console.log("filtro");
}

document.addEventListener('DOMContentLoaded', function () {
    var image = document.getElementsByClassName('parallax-image');
    new simpleParallax(image, {
        // Opciones aquí. Por ejemplo:
        scale: 1.5,
       
    });
});
  
  