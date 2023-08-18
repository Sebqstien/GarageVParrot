document.addEventListener('DOMContentLoaded', function () {
    const filtresForm = document.getElementById('filtresForm');
    const annoncesContainer = document.getElementById('annoncesContainer');

    filtresForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(filtresForm);
        const params = new URLSearchParams(formData);

        const url = '/filtres?' + params.toString();

        console.log('Fetching data from:', url);

        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log('Received data:', data);
                annoncesContainer.innerHTML = data.html;
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    });
});
