document.addEventListener('DOMContentLoaded', function () {
    const filtresForm = document.getElementById('filtresForm');
    const annoncesContainer = document.getElementById('annoncesContainer');

    filtresForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(filtresForm);


        fetch('/annonces/filtres', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                annoncesContainer.innerHTML = data.html;
            })
            .catch(error => {
                throw new Error('An erro occurred: ' + error)
            });
    });
});