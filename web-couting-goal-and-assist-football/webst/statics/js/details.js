document.querySelectorAll('.shoeNameCell').forEach(function(element) {
    element.addEventListener('mouseover', function() {
        this.classList.add('hoverEffect');
    });

    element.addEventListener('mouseout', function() {
        this.classList.remove('hoverEffect');
    });

    element.addEventListener('click', function() {
        var shoeId = this.getAttribute('data-shoe-id');
        window.location.href = 'manageshoe.php?id=' + shoeId;
    });
});