document.querySelectorAll('.shoeNameCell').forEach(function(element) {
    element.addEventListener('click', function() {
        var shoeId = this.getAttribute('data-shoe-id');
        window.location.href = 'manageshoe.php?id=' + shoeId;
    });
});