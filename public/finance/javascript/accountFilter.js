document.getElementById('Search').addEventListener('input', function(e) {
    var searchValue = e.target.value.toLowerCase();
    var divs = document.querySelectorAll('.accountsDivs'); // replace 'div' with the appropriate selector for your divs

    divs.forEach(function(div) {
        if (div.textContent.toLowerCase().includes(searchValue)) {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });
});